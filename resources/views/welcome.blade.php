<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Next Generation Staff Management System">
    <title>SMS | {{ config('app.name', 'Staff Management System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
            },
            colors: {
              brand: {
                50: '#eff6ff',
                100: '#dbeafe',
                400: '#60a5fa',
                500: '#3b82f6',
                600: '#2563eb',
                900: '#1e3a8a',
                950: '#172554',
              }
            },
            animation: {
              'blob': 'blob 7s infinite',
              'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
            },
            keyframes: {
              blob: {
                '0%': { transform: 'translate(0px, 0px) scale(1)' },
                '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                '100%': { transform: 'translate(0px, 0px) scale(1)' },
              },
              fadeInUp: {
                '0%': { opacity: '0', transform: 'translateY(20px)' },
                '100%': { opacity: '1', transform: 'translateY(0)' },
              }
            }
          }
        }
      }
    </script>
    <style>
      .glass-nav {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      }
      .glass-card {
        background: rgba(30, 41, 59, 0.4);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
      }
      .glass-card:hover {
        background: rgba(30, 41, 59, 0.6);
        border: 1px solid rgba(96, 165, 250, 0.3);
        transform: translateY(-4px);
        box-shadow: 0 12px 40px -12px rgba(59, 130, 246, 0.2);
      }
      .hero-gradient {
        background: radial-gradient(circle at center, rgba(37, 99, 235, 0.15) 0%, rgba(15, 23, 42, 1) 100%);
      }
    </style>
  </head>
  <body class="bg-[#0f172a] text-slate-300 font-sans antialiased overflow-x-hidden selection:bg-brand-500 selection:text-white">
    
    <!-- Background Animated Blobs -->
    <div class="fixed inset-0 w-full h-full pointer-events-none z-0 overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-brand-600/30 rounded-full mix-blend-screen filter blur-[100px] animate-blob"></div>
        <div class="absolute top-[20%] right-[-5%] w-96 h-96 bg-purple-600/20 rounded-full mix-blend-screen filter blur-[100px] animate-blob" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-[-20%] left-[20%] w-[500px] h-[500px] bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[120px] animate-blob" style="animation-delay: 4s;"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center space-x-3 group cursor-pointer">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-brand-500/30 group-hover:scale-105 transition-transform duration-300">
                        S
                    </div>
                    <span class="font-bold text-xl tracking-tight text-white group-hover:text-brand-400 transition-colors">SMS<span class="text-brand-500">.</span></span>
                </div>
                <div class="flex space-x-6 items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-slate-300 hover:text-white transition-colors">Dashboard</a>
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/5 text-white font-medium text-sm transition-all duration-300 backdrop-blur-sm">Open App &rarr;</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-slate-300 hover:text-white transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full bg-brand-600 hover:bg-brand-500 text-white font-medium text-sm shadow-lg shadow-brand-500/25 transition-all duration-300 transform hover:-translate-y-0.5">Start Free Trial</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="relative z-10 pt-32 pb-16 sm:pt-40 sm:pb-24 lg:pb-32 overflow-hidden hero-gradient min-h-screen flex flex-col justify-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
            
            <div class="inline-flex items-center px-4 py-2 rounded-full glass-card text-sm font-medium text-brand-400 mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                <span class="w-2 h-2 rounded-full bg-brand-400 mr-2 animate-pulse"></span>
                Staff Management System v2.0
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight leading-tight mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                Manage your workforce <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 via-indigo-400 to-purple-400">
                    without the chaos.
                </span>
            </h1>
            
            <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-400 leading-relaxed animate-fade-in-up" style="animation-delay: 0.3s;">
                The modern, unified platform for ambitious teams. Track attendance, automate payroll, and handle leave requests with unprecedented elegance and speed.
            </p>

            <div class="mt-10 flex justify-center gap-4 animate-fade-in-up" style="animation-delay: 0.4s;">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-8 py-4 rounded-full bg-white text-slate-900 font-semibold text-lg hover:bg-brand-50 transition-colors shadow-[0_0_40px_-10px_rgba(255,255,255,0.3)]">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="px-8 py-4 rounded-full bg-brand-600 text-white font-semibold text-lg hover:bg-brand-500 hover:shadow-lg hover:shadow-brand-500/30 transition-all duration-300 transform hover:-translate-y-1">
                        Get Started for Free
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-4 rounded-full glass-card text-white font-semibold text-lg hover:bg-white/10 hover:text-white transition-all duration-300">
                        Sign In
                    </a>
                @endauth
            </div>

            <!-- Features Preview -->
            <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-8 text-left animate-fade-in-up" style="animation-delay: 0.6s;">
                
                <!-- Feature 1 -->
                <div class="glass-card p-8 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-brand-500/20 border border-brand-500/30 flex items-center justify-center mb-6 text-brand-400">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Directory & Roles</h3>
                    <p class="text-slate-400 leading-relaxed">Centralize your entire company hierarchy. Organize departments, designations, and role-based permissions instantly.</p>
                </div>

                <!-- Feature 2 -->
                <div class="glass-card p-8 rounded-2xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-12 h-12 rounded-xl bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center mb-6 text-indigo-400 relative z-10">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3 relative z-10">Leave & Schedule</h3>
                    <p class="text-slate-400 leading-relaxed relative z-10">Employees can easily apply for time off. Admins get beautiful overview calendars for shifts, schedules, and team availability.</p>
                </div>

                <!-- Feature 3 -->
                <div class="glass-card p-8 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/20 border border-purple-500/30 flex items-center justify-center mb-6 text-purple-400">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Payroll & Attendance</h3>
                    <p class="text-slate-400 leading-relaxed">Let the software do the math. Log daily attendance seamlessly and generate structured payroll reports out-of-the-box.</p>
                </div>

            </div>

        </div>
    </main>
    
    <footer class="bg-[#0b1120] border-t border-white/5 py-8 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center opacity-70">
            <p class="text-slate-400 text-sm">© {{ date('Y') }} Staff Management System. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="text-slate-400 hover:text-brand-400 transition-colors">Privacy</a>
                <a href="#" class="text-slate-400 hover:text-brand-400 transition-colors">Terms</a>
            </div>
        </div>
    </footer>
  </body>
</html>
