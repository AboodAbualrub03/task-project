<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster | Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .task-pattern {
            background-color: #1e293b;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232d3a4f' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2v-4h4v-2h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2v-4h4v-2H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-[#f1f5f9] flex items-center justify-center min-h-screen p-4">

<div class="flex w-full max-w-[1100px] bg-white rounded-[2.5rem] shadow-[0_30px_80px_rgba(15,23,42,0.15)] overflow-hidden min-h-[700px]">
    
    <div class="hidden md:flex md:w-5/12 task-pattern p-16 flex-col justify-between text-white relative">
        <div class="z-10">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-500 rounded-2xl mb-8 shadow-lg shadow-blue-500/20">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold mb-4 tracking-tight">Focus on <br><span class="text-blue-400">what matters.</span></h1>
            <p class="text-slate-400 text-lg leading-relaxed">The ultimate workspace to manage your tasks, track progress, and hit your deadlines.</p>
        </div>
        
        <div class="z-10 space-y-6">
            <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700 backdrop-blur-sm">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-green-400"></div>
                    <p class="text-sm font-medium">Daily sprint completed successfully</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="flex -space-x-3">
                    <img class="w-10 h-10 rounded-full border-2 border-slate-800" src="https://i.pravatar.cc/150?u=a" alt="">
                    <img class="w-10 h-10 rounded-full border-2 border-slate-800" src="https://i.pravatar.cc/150?u=b" alt="">
                    <img class="w-10 h-10 rounded-full border-2 border-slate-800" src="https://i.pravatar.cc/150?u=c" alt="">
                </div>
                <p class="text-xs text-slate-400 leading-tight">Join <span class="text-white font-bold">2,500+</span> teams <br>staying organized.</p>
            </div>
        </div>
    </div>

    <div class="w-full md:w-7/12 p-10 md:p-24 flex flex-col justify-center bg-white">
        <div class="mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Welcome Back</h2>
            <p class="text-slate-500 font-medium">Enter your credentials to manage your tasks.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                <div class="relative">
                    <input type="email" name="email" required
                        class="w-full pl-4 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all duration-300"
                        placeholder="alex@example.com">
                </div>
            </div>

            <div>
                <div class="flex justify-between mb-2">
                    <label class="text-sm font-bold text-slate-700">Password</label>
                    <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700">Reset Password?</a>
                </div>
                <input type="password" name="password" required
                    class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all duration-300"
                    placeholder="••••••••">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="rem" class="w-5 h-5 text-blue-600 border-slate-300 rounded-lg focus:ring-blue-500">
                <label for="rem" class="ml-3 text-sm text-slate-500 select-none">Keep me logged in</label>
            </div>

            <button type="submit"
                class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold text-lg hover:bg-slate-800 transform transition-all duration-300 active:scale-[0.98] shadow-xl shadow-slate-200">
                Sign In 
            </button>

            <p class="text-center text-sm text-slate-500 mt-8">
                New to the platform? 
                <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Create an account</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>