<div>
	<div class="container">
    <div class="row justify-content-center">
      
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush">
                          
                            @foreach($users as $user)
                                <a wire:click="getUser( {{ $user->id }} )" class="text-dark link">
                                    <li class="list-group-item d-flex">
                                        <img class="img-fluid avatar" src=" {{ asset('images/bighead.png') }} ">
                                        
                                        <div class="d-flex align-items-center ml-2">
                                            <div class="mr-2"><i class="fa fa-circle text-success online-icon mr-1"></i>{{ $user->name }}</div>


                                            <div class="badge badge-success-rounded">30</div>
                                        </div>
                                             
                                         
                                    </li>
                                </a>
                            @endforeach
                                
                        </ul>
                    </div>
                </div>
            </div>
  
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(isset($sender))
                        {{$sender->name}} 
                    @endif
                </div>
                <div class="card-body message-box">
                   
                            <div class="single-message">
                                <p class="font-weight-bolder my-0">Name</p>
                                    Message
                                <br><small class="text-muted w-100">Sent <em></em></small>
                            </div>

                            
                        
                </div>
                 
                <div class="card-footer">
                    <form wire:submit.prevent="SendMessage">
                        <div class="row">
                            <div class="col-md-8">
                                <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" required>
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary d-inline-block w-100"> Send <i class="far fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
             
            </div>
        </div>
    </div>
</div>
</div>
