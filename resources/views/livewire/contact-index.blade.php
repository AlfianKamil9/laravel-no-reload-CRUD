<div>
    @if ($formUpdate)
        @if ($formUpdate)    
        <livewire:contact-update></livewire:contact-update> 
        {{-- <button class="mt-3 btn bg-success btn-sm text-light" wire:click="showFormCreate()">Create</button> --}}
        <button class="mt-3 btn bg-danger btn-sm text-light" wire:click="closeFormUpdate()">Cancel</button>
        @endif
    @else
        @if ($formCreate)
        <livewire:contact-create></livewire:contact-create> 
        <hr/>
        <button class="mt-3 btn bg-danger btn-sm text-light" wire:click="closeFormCreate()">Close Form Create</button>
        @else
            <button class="mt-3 btn bg-success btn-sm text-light" wire:click="showFormCreate()">Create</button>
        @endif
    @endif


    @if ( session()->has('message'))
        <div class="mt-2 mb-2">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Horaa!</strong>  {{ session('message') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @elseif(session()->has('error'))
    <div class="mt-2 mb-2">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ups!</strong>  {{ session('error') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <table class="table mt-3 border shadow-sm">
        <thead class="" >
            <tr>
                <th style="background-color: teal; color:white" colspan="4">
                    <div class="d-flex">
                            <div class="col-md-1 me-3">
                                <select wire:model="paginate" name="" id="" class="form-control sm  m-3" >
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-10">
                                <input wire:model="search" class="form-control m-3" width="700px" placeholder="SEACRH .." /> 
                            </div>
                        
                    </div>
                </th>
            </tr>
            <tr>
                <th style="background-color: teal; color:white">No</th>
                <th style="background-color: teal; color:white">Name</th>
                <th style="background-color: teal; color:white">Email</th>
                <th style="background-color: teal; color:white">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            @foreach ($users as $user)
            <tr class="table">
                <td>{{ $i++ }}.</td>
                <td>{{ $user->name }}</td>
                 <td>{{ $user->email }}</td>
                <td> 
                    <div class="d-flex">
                        <button class="btn btn-sm bg-info m-1 text-light" wire:click="clickUpdate({{ $user->id }})">Update</button>
                        <button class="btn btn-sm bg-danger m-1 text-light" wire:click="clickDelete({{ $user->id }})">Delete</button>
                    </div>
                </td>
            </tr>
               @endforeach

            </tbody>
        </table>
      
        <div style="width:800px; height:20px;" class="d-flex">
             <nav>
                 {{ $users->links() }}
             </nav>
        </div>

    
</div>
