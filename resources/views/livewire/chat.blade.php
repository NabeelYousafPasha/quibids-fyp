@if ((config('constants.chat.realtime') ?? false) == true)
    <div wire:poll>
@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <style>
                    .scrollbar-w-2::-webkit-scrollbar {
                      width: 0.25rem;
                      height: 0.25rem;
                    }

                    .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
                      --bg-opacity: 1;
                      background-color: #f7fafc;
                      background-color: rgba(247, 250, 252, var(--bg-opacity));
                    }

                    .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
                      --bg-opacity: 1;
                      background-color: #edf2f7;
                      background-color: rgba(237, 242, 247, var(--bg-opacity));
                    }

                    .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
                      border-radius: 0.25rem;
                    }
                </style>

                <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
                    <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
                       <div class="flex items-center space-x-4">
                          <div class="flex flex-col leading-tight">
                                <div class="text-2xl mt-1 flex items-center">
                                <span class="text-gray-700 mr-3">{{ $recipient->name }}</span>
                                </div>
                          </div>
                       </div>
                       <br>
                       <div class="flex items-center space-x-2">
                            <div class="text mt-1 flex items-center">
                                <span class="text-gray-500 mr-3">{{ 'Chat' }}</span>
                            </div>
                       </div>
                    </div>
                    <div
                        id="messages"
                        class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch"
                    >
                       <div class="chat-message">
                          <div class="flex items-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">Can be verified on any platform using docker</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end justify-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">Your error message says permission denied, npm global installs must be given root privileges.</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">Command was run with root privileges. I'm sure about that.</span></div>
                                <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">I've update the description so it's more obviously now</span></div>
                                <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">FYI https://askubuntu.com/a/700266/510172</span></div>
                                <div>
                                   <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                                      Check the line above (it ends with a # so, I'm running it as root )
                                      <pre># npm install -g @vue/devtools</pre>
                                   </span>
                                </div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end justify-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">Any updates on this issue? I'm getting the same error when trying to install devtools. Thanks</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">Thanks for your message David. I thought I'm alone with this issue. Please, 👍 the issue to support it :)</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end justify-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                <div><span class="px-4 py-2 rounded-lg inline-block bg-blue-600 text-white ">Are you using sudo?</span></div>
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">without using sudo</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">It seems like you are from Mac OS world. There is no /Users/ folder on linux 😄</span></div>
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">I have no issue with any other packages installed with root permission globally.</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end justify-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">yes, I have a mac. I never had issues with root permission as well, but this helped me to solve the problem</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
                          </div>
                       </div>
                       <div class="chat-message">
                          <div class="flex items-end">
                             <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">I get the same error on Arch Linux (also with sudo)</span></div>
                                <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">I also have this issue, Here is what I was doing until now: #1076</span></div>
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">even i am facing</span></div>
                             </div>
                             <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
                          </div>
                       </div>
                    </div>
                    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                       <div class="relative flex">
                          <input type="text" placeholder="Write Something" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3">
                          <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">

                             <button type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                                   <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                </svg>
                             </button>
                          </div>
                       </div>
                    </div>
                 </div>



                 <script>
                     const el = document.getElementById('messages')
                     el.scrollTop = el.scrollHeight
                 </script>

                <div class="p-6 bg-white border-b border-gray-200" style="position:static; top:800px">
                    {{-- @forelse( $messages as $message)
                        <div class="p-6 bg-white border-b border-gray-200">

                            <label style="color:rgb(25, 25, 95); font-family:verdana" for="user_name">
                                {{ $message->user->name}}
                            </label>

                            @if ($message->status == 2)
                            <label style="color:rgb(122, 6, 255);" for="user_name">{{ $message->message}} : {{$message->status}}</label>
                            <label style="color:rgb(6, 255, 139);" for="user_name">new</label>
                            @else
                            <label style="color:black;" for="user_name">{{ $message->message}}</label>
                            <label style="color:black; text-align:right" for="user_name">{{$message->created_at}}</label>
                            @endif

                            <br/>
                        </div>
                    @empty
                        No previous chat
                    @endforelse

                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $messages->links() }}
                    </div> --}}
                </div>

            </div>
        </div>
    </div>

@if ((config('constants.chat.realtime') ?? false) == true)
    </div>
@endif
