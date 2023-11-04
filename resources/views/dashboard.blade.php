<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->role->name == 'manager')
                        <span class="text-blue-700 text-xl font-bold">Received applications</span>
                        @foreach($applications as $application)
                            <div class='mt-5'>
                                <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                                    <div class="flex w-full items-center justify-between border-b pb-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                            <div class="text-lg font-bold text-slate-700">{{$application->user->name}}</div>
                                        </div>
                                        <div class="flex items-center space-x-8">
                                            <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold text-black">{{$application->id}}</button>
                                            <div class="text-xs text-neutral-500">{{$application->created_at}}</div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mb-6">
                                        <div class="mb-3 text-xl font-bold text-black">{{$application->subject}}</div>
                                        <div class="text-sm text-neutral-600">{{$application->message}}</div>
                                    </div>

                                    <div>
                                        <div class="flex items-center justify-between text-slate-500">
                                            <div class="flex space-x-4 md:space-x-8">
                                                {{$application->user->email}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @if(session()->has('error')) error
                            <div class="px-4 py-3 leading-normal text-red-100 bg-red-700 rounded-lg" role="alert">
                                <p>{{session()->get('error')}}</p>
                            </div>
                        @endif
                        <div class='flex items-center justify-center min-h-screen '>
                            <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                                <div class='max-w-md mx-auto space-y-6 text-black'>

                                    <form action="{{route('applications.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <h2 class="text-2xl font-bold ">Submit your application</h2>
                                        <hr class="my-6">
                                        <label class="uppercase text-sm text-black font-bold opacity-70">Subject</label>
                                        <input type="text" name="subject" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded" required>
                                        <label class="uppercase text-sm text-black font-bold opacity-70">Message</label>
                                        <textarea rows="4" name="message" type="text" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded" required></textarea>
                                        <label class="uppercase text-sm text-black font-bold opacity-70">File</label>
                                        <input type="file" name="file" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded text-black" required>
                                        <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Send">
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
