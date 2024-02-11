    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{__('message.sure_déconnecter')}}</div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal">{{__('message.Non')}}</button>
                    <a class="btn btn-primary"  href="javascript:void(0);"
                    onclick="event.preventDefault();document.getElementById('auth-form').submit();">{{__('message.Oui')}}</a>
                    <form action="{{ route('logout') }}" method="POST" id="auth-form">
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
