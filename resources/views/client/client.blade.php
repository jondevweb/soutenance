<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            main a{
                color: white !important;
            }

            nav a:focus{
                color: #b1dc4c !important;
            }

            .navbar-collapse{
                width: 0px;
            }

            .show{
                width: 100%;
            }

            button{
                border: none  !important;
            }

            .btn {
                background-color: #fff;
            }

            .btn:hover {
                background-color: #003f6e;
                color: white;
            }

            .navbar-expand-lg .navbar-nav .dropdown-menu {
                position: static;
            }

            .nav-tabs .nav-link.active, .dropdown-menu, .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active, .dropdown-item:hover {
                background-color: rgba(0,0,0,0);
                border-color: rgba(0,0,0,0);
            }

            .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
                border-color: rgba(0,0,0,0);
            }
        </style>
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </head> 
    <body class="font-sans antialiased dark:bg-black dark:text-white/50" style="height: 92vh;">
    @if(Auth::check())
        <header style="display:flex; box-shadow: 0px 2px 10px #6c757d;" class="navbar-light">
            <div style="width: 40%; display:flex;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn  my-2 my-sm-0" type="submit">Recherche</button>
                </form>
            </div>
            <div style="width: 60%; display:flex; justify-content: end;"> 
                <div class="input-group" style="width: 60%">
                    <select class="custom-select" id="collecteId" onchange="updateVueData()" style="height: 100%; background: #c5ceae;" > 
                    @if (session()->get('triethic')['roles'] = 'client')
                        <option selected  value= "2">Point de collecte</option>
                        @foreach ($user->pointCollecte as $pointCollecte)
                            <option value="{{$pointCollecte->id}}">{{$pointCollecte->raison_sociale}}</option>
                        @endforeach
                    @else 
                        <option value= "2" selected>Pas de point de collecte</option>
                    @endif
                    </select>
                </div>
                <div class="dropdown" style="width: 200px;">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display:flex; width: 100%; height: 100%; align-items: end;">
                        <img fit='contain' src="/image/user.svg" spinner-color="white" style="margin: auto; width: 35px;"></img>
                        <div style="display:flex; flex-direction: column; width: 75%;" >
                            <span>{{$user->prenom}}</span> 
                            <span>{{$user->nom}}</span>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="    border: 1px solid black; ">
                        <a class="dropdown-item" href="#">Mes informations</a>
                        <a class="dropdown-item" href="#">Documentation</a>
                        <button class="dropdown-item" onClick="logout()">Déconnexion</button>

                    </div>
                </div>
            </div>
        </header>
        <main style="display:flex; height: 100%;">
            <section style="background: #003f6e;" >
            <!-- <section style="width: 300px; background: #003f6e;"> -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                        <ul class="nav nav-tabs navbar-nav mr-auto"  id="myTab" role="tablist" style=" display: flex; flex-direction: column; margin-left: 50px; width: 150px;">
                            <li class="nav-item">
                                <a class="nav-link" onClick="componentSelected(1712)" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="profile" aria-selected="false">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Contact</a>
                            </li>
                            <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" id="dropdown-tab" data-toggle="tab" href="#dropdown" role="tab" aria-controls="dropdown"  aria-selected="false">dropdown</a>
                                <a class="dropdown-item" id="dropdown-2-tab" data-toggle="tab" href="#dropdown-2" role="tab" aria-controls="dropdown-2" aria-selected="false">dropdown-2</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Entreprise</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link active" id="preference-tab" data-toggle="tab" href="#preference" role="tab" aria-controls="preference" aria-selected="true">preference</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>
            <section>
            <div id="app" style="margin-left: 300px;" data-initial-value="">
            
    </div>
                <div class="tab-content">
                    <div class="tab-pane" id="home" role="tabpanel" aria-labelledby="home-tab">home</div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('client/profile')</div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">@include('client/messages')</div>
                    <div class="tab-pane" id="dropdown" role="tabpanel" aria-labelledby="dropdown-tab">dropdown</div>
                    <div class="tab-pane" id="dropdown-2" role="tabpanel" aria-labelledby="dropdown-2-tab">dropdown-2</div>
                    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="dropdown-2-tab">@include('client/entreprise')</div>
                    <div class="tab-pane" id="preference" role="tabpanel" aria-labelledby="dropdown-2-tab">@include('client/preference')</div>
                </div>
                @if (session()->get('triethic')['roles'] = 'client')
                        @foreach ($user->pointCollecte as $pointCollecte)
                           {{$pointCollecte->id}}
                        @endforeach
                    @else 
                        
                    @endif
            </section>
        </main>

       <!--  <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" /> 
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">                            
                        @auth
                        <a href="/logout">
                            <button>Log out</button>
                        </a>
                        <div>data : 

                        
                        </div>
                        @else 
                           
                            <div class="row"> Pas de données
                                <form action="/login" method="post">
                                @csrf
                                    <div flat sared classe="pa-lg" style='background: #cdd2c4;'>
                                        <div style='margin-bottom: 0;padding-bottom: 0;'>
                                            <img
                                                fit='contain'
                                                src="/image/ID-icionrecycle-logo.svg"
                                                spinner-color="white"
                                            ></img>
                                        </div>
                                        <div style='margin: 1rem;'>
                                            <input type="email" id="email" name="email" />
                                             <input v-model="email" type="email" label="" bottom-slots hint='Courriel' :rules="[ val => emailValidator(val) || 'Courriel invalide']">
                                                <template v-slot:prepend><icon name="fas fa-envelope"></icon></template>
                                            </input> 
                                            <input type="password" id="password" name="password" />
                                             <input v-model="password" :type="isPwd ? 'password' : 'text'" label="" hint='Mot de passe' :rules='[ val => val.length > 0 || ""  ]' bottom-slots>
                                                <template v-slot:prepend><icon name="fas fa-lock"></icon></template>
                                                <template v-slot:append>
                                                    <icon
                                                        :name="isPwd ? 'visibility_off' : 'visibility'"
                                                        class="cursor-pointer"
                                                        @click="isPwd = !isPwd"
                                                    ></icon>
                                                    </template>
                                            </input> 
                                        </div>
                                        <input type="submit">
                                         <div-actions class="px-md"  style='margin: 1rem;margin-bottom: 0'>
                                            <btn type="submit" size="lg" class="full-width" :disabled="!emailValidity || password.length == 0" label="Se connecter" style='width: 17em !important;opacity: 1 !important;background: #003f6e;color: white;'></btn>
                                        </div-actions> -
                                        <div style='padding:0;padding: 0;text-align: center;height: 1em;'>
                                            <a href='javascript:void(0)' v-on:click='askConfirm' v-show='emailValidity' style='font-size: x-small;color: white;'>Vous avez oublié votre mot de passe ?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div> -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                
        <script>
            $(function () {
                $('#myTab li:last-child a').tab('show')
            })

            function updateVueData() {
                const collecteId = document.getElementById('collecteId');
                const componentCollecteId = parseInt(collecteId.value, 10);
                console.log('number :' + componentCollecteId);
                const event = new CustomEvent('value-changed', { detail: componentCollecteId });
                document.getElementById('app').dispatchEvent(event);
            }

            var link;
            async function newLink(){
                console.log(link)
            }

            var $SESSION;
            async function componentSelected(id){
                await axios.post('api/entreprise/1712', {
                    id: id
                })
                .then(response => {
                    link = response.data;
                    console.log(link);
                })
                .catch(error => {
                    error.response;
                });
            }
            console.log(link);
            console.log(link);
            // console.log({!!$user!!});
            async function logout() {
                event.preventDefault(); 
                axios.post('/logout')
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    if (error.response) {
                        console.error('Server responded with an error:', error.response.data);
                        console.error('Status code:', error.response.status);
                    } else if (error.request) {
                        console.error('No response received:', error.request);
                        if (error.message.includes('Network Error')) {
                            console.error('This might be a CORS issue or network problem.');
                        }
                    } else {
                        console.error('Error setting up request:', error.message);
                    }
                    console.error('Config:', error.config);
                });
            };
        </script>
        @endif
        
    </body>
</html>
