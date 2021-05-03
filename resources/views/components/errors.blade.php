      @if(Session::has('success'))
      <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span class="font-weight-semibold"><strong>Success! </strong>
            {!!Session::get('success')!!}
          </span>
      </div>          
      @endif

      @if(Session::has('fail'))
      <div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span class="font-weight-semibold"><strong>Failed! </strong>
            {!!Session::get('fail')!!}
          </span>
      </div>          
      @endif
      @if ($errors->any())
          <div class="alert alert-danger">

              <ul>
                  <li><strong>Validation Error</strong></li>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif    