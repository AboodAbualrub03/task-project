<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster | Create Account</title>
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

<div class="flex w-full max-w-[1100px] bg-white rounded-[2.5rem] shadow-[0_30px_80px_rgba(15,23,42,0.15)] overflow-hidden min-h-[750px]">
    
    <div class="hidden md:flex md:w-5/12 task-pattern p-16 flex-col justify-between text-white relative">
        <div class="z-10">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-500 rounded-2xl mb-8 shadow-lg shadow-blue-500/20">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold mb-4 tracking-tight">Join the <br><span class="text-blue-400">Productive Elite.</span></h1>
            <p class="text-slate-400 text-lg leading-relaxed">Create your account today and start organizing your tasks like a pro.</p>
        </div>
        
        <div class="z-10 space-y-6">
            <div class="bg-slate-800/50 p-4 rounded-xl border border-slate-700 backdrop-blur-sm">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></div>
                    <p class="text-sm font-medium">New member dashboard ready</p>
                </div>
            </div>

            <p class="text-xs text-slate-500">By signing up, you agree to our <a href="#" class="underline">Terms of Service</a>.</p>
        </div>
    </div>

    <div class="w-full md:w-7/12 p-10 md:p-16 flex flex-col justify-center bg-white">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Create Account</h2>
            <p class="text-slate-500 font-medium">Get started with your free 14-day trial.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="grid grid-cols-1 gap-5">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all duration-300"
                    placeholder="John Doe">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all duration-300"
                    placeholder="name@company.com">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all duration-300"
                        placeholder="••••••••">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all duration-300"
                        placeholder="••••••••">
                </div>
            </div>

            <button type="submit"
                class="w-full bg-slate-900 text-white py-4 rounded-2xl font-bold text-lg hover:bg-slate-800 transform transition-all duration-300 active:scale-[0.98] shadow-xl shadow-slate-200 mt-2">
                Create My Account
            </button>

            <div class="relative flex items-center py-2">
                <div class="flex-grow border-t border-slate-100"></div>
                <span class="flex-shrink mx-4 text-slate-400 text-xs font-bold uppercase tracking-widest">Or</span>
                <div class="flex-grow border-t border-slate-100"></div>
            </div>

            <p class="text-center text-sm text-slate-500">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Sign In here</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>