<div>
     <h3 class="mt-3 mb-2">FORM CREATE</h3>
    <form class="mb-1 mt-3" wire:submit.prevent='store()'>   
        <div class="d-flex">
                <div class="w-50 m-1">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input wire:model="password" type="password" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="w-50 m-1">
                    <div class="mb-3">
                        <label class="form-label" for="exampleCheck1">Name</label>
                        <input wire:model="name" type="text" class="form-control @error('email') is-invalid @enderror" id="exampleCheck1">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-info">Create Users</button>
                    </div>
                </div>
        </div>
       
    </form>


</div>
