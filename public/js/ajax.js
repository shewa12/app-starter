
  const siteurl = "http://newgen-bd.com/feedbackmanager";
  const add = $('[name="add"]').val();
  const update = $('[name="update"]').val();
  const del = $('[name="delete"]').val();
  const sendmail = $('[name="sendMailUrl"]').val();

  //console.log(add+update+del);
  function resetForm(formId)
  {
    document.getElementById(formId).reset();
  }
  
  $(document).ready(function(){
    //sending mail
      $("#sendMail").on('submit',function(e){
        e.preventDefault();
        const url = siteurl+"/"+sendmail;
        const div = "#mailResponse";
        let formData = $("#mailForm").serialize();
        ajaxPost(url,formData,div);
      });      
    //adding
      $("#addForm").on('submit',function(e){
        e.preventDefault();
        const url = siteurl+"/"+add;
        const div = "#addingResponse";
        let formData = $("#addForm").serialize();
        ajaxPost(url,formData,div);
      });
    //updating 
      $("#updateForm").on('submit',function(e){
        e.preventDefault();
        const url = siteurl+"/"+update;
        const div = "#updatingResponse";
        let formData = $("#updateForm").serialize();
        ajaxPost(url,formData,div);
      });  
     //deleting  
      $(".delete").on('click',function(e){
     
        const whichtr = $(this).closest('tr');

        const url = siteurl+"/"+del;
        let token = $('meta[name="csrf-token"]').attr('content');
        const id = $(this).attr('id');
        let formData = {id:id,_token:token};
        ajaxDelete(url,formData,whichtr);
      });         
  });


  

  function ajaxPost(url,formData,div)
  {
    $(div).removeClass('alert alert-danger');
    $(div).empty();
    $.ajax({
      url: url,
      type: 'post',
      data: formData,
      dataType: 'json',
      beforeSend:()=>{
        $(".overlay").show();
      },
      success:(data)=>{
        $(".overlay").hide();
        if(data.status==="ok")
        {
          $.confirm({
              title: 'Success!',
              content: data.msg,
              buttons: {
                  ok: function () {
                      location.reload();
                  },
                  /*
                  cancel: function () {
                      $.alert('Canceled!');
                  },

                  somethingElse: {
                      text: 'Something else',
                      btnClass: 'btn-blue',
                      keys: ['enter', 'shift'],
                      action: function(){
                          $.alert('Something else?');
                      }
                  }
                  */
              }
          });          
        }
        if(data.status==="validationError")
        {
            $(div).addClass('alert alert-danger');   
            for(let [key,value ] of Object.entries(data.msg))
            {
              //$("#addingResponse").addClass('alert alert-danger');
              $(div).append(`<li>${value}</li>`);
            }
            
        }

        if(data.status==="error")
        {
            $.alert({
                title: 'Failed',
                content: data.msg,
            });  

        }

      },
      error:()=>{
        $(".overlay").hide();
            $.alert({
                title: 'Failed',
                content: 'Something went wrong, please try again!',
            });  
      }
    });
  }
  function ajaxDelete(url,formData,whichtr)
  {

    $.confirm({
        title: 'Do you want to delete?',
        buttons: {
            confirm: function () {
              $.ajax({
                url: url,
                type: 'post',
                data: formData,
                dataType: 'html',
                beforeSend:()=>{
                  $(".overlay").show();
                },
                success:(data)=>{
                  $(".overlay").hide();
                  whichtr.remove();
                },
                error:()=>{
                  $(".overlay").hide();
                }      
              })
            },
            cancel: function () {
                
            },
        }
    });   

  }
