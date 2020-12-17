<div id="subscribe" class="modal fade " role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <h5 class="modal-title text-center text-white">We'll Let You Know When Something New Happens!</h5>
            </div>
            <div class="modal-body">
 
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address">
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block" type="submit">Subscribe</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>