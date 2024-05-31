<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>

<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>-->

        <!-- Fonts -->
       <!--  <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />-->

        <!-- Styles -->
     <!--   <style>
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">YO !!!!
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="mt-6">
                        @if(Auth::check())
                        <div>Connecté !!! Voici le USER : <BR/>

                            <div id="app">
                                <div class="container">
                                    <button @click="logout">Logout</button>
                                </div>
                            </div>
                            <script>
                                const QApp = {
                                    el: '#app',
                                    data: function () {
                                        return {
                                        }
                                    },
                                    watch: {
                                    },
                                    methods: {
                                        logout: function() {
                                            var vm = this
                                            axios.post('/logout', {})
                                            .then(function (response) {
                                                window.location.reload();
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            });
                                        }
                                    },
                                    mounted: function() {
                                        var vm  = this
                                    }
                                }
                                window.addEventListener('load', function() {
                                const app = Vue.createApp(QApp)
                                app.mount('#app')
                                })
                            </script>
                        </div>
                        @else
                            <div id="app">
                                <div class="container">
                                    <label for="uname"><b>Username</b></label>
                                    <input v-model="username" type="text" placeholder="Enter Username" name="uname" required>

                                    <label for="psw"><b>Password</b></label>
                                    <input v-model="password" type="password" placeholder="Enter Password" name="psw" required>

                                    <button @click="validAuth" type="submit">Login</button>
                                    <label>
                                    <input type="checkbox" checked="checked" name="remember"> Remember me
                                    </label>
                                </div>
                            </div>
                            <script>
                                const QApp = {
                                    el: '#app',
                                    data: function () {
                                        return {
                                            username: '',
                                            password: ''
                                        }
                                    },
                                    watch: {
                                    },
                                    methods: {
                                        validAuth: function() {
                                            var vm = this
                                            axios.post('/login', {
                                                email: vm.username,
                                                password: vm.password
                                            })
                                            .then(function (response) {
                                                window.location.reload();
                                            })
                                            .catch(function (error) {
                                                console.log(error);
                                            });
                                        }
                                    },
                                    mounted: function() {
                                        var vm  = this
                                    }
                                }
                                window.addEventListener('load', function() {
                                const app = Vue.createApp(QApp)
                                app.mount('#app')
                                })
                            </script>
                        @endif
                    </main>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.47/vue.global.min.js" integrity="sha512-DJ2+sosWB5FnZAIeCWAHu2gxQ7Gi438oOZLcBQSOrW8gD0s7LIXDv/5RW76B3FcljF40BXnfqNIo6Dhp7dFHJg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html> -->
