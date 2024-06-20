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
            a:hover {
                text-decoration: none;
                background: rgba(0,0,0,0) !important;
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

            .dropdown-menu, .dropdown-item:hover {
                background-color: rgba(0,0,0,0);
                border-color: rgba(0,0,0,0);
            }
        </style>
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </head> 
    <body class="font-sans antialiased dark:bg-black dark:text-white/50" style="height: 92vh;">
    @if(Auth::check())
        <header style="display:flex; box-shadow: 0px 2px 10px #6c757d;" class="navbar-light">
            <div style="width: 40%; display:flex;">
                <div id="burgerMenu" style="width: 30%"></div>
                <form style="width: 70%" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn  my-2 my-sm-0" type="submit">R</button>
                </form>
            </div>
            <div style="width: 60%; display:flex; justify-content: end;"> 
                <div class="input-group" style="width: 60%">
                    <select class="custom-select" id="collecteId" onchange="updateVueData()" style="height: 100%; background: #c5ceae;" > 
                    @if (session()->get('triethic')['roles'] = 'client')
                        <option selected  value="0">Point de collecte</option>
                        @foreach ($user->pointCollecte as $pointCollecte)
                            <option value="{{$pointCollecte->id}}">{{$pointCollecte->raison_sociale}}</option>
                        @endforeach
                    @else 
                        <option value="0" selected>Pas de point de collecte</option>
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
            <div id="app" data-initial-value="" style="height: 100%"></div>
          <!--  @if (session()->get('triethic')['roles'] = 'client')
                        @foreach ($user->pointCollecte as $pointCollecte)
                           {{$pointCollecte->id}}
                        @endforeach
                    @else 
                        
                    @endif-->
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            const collecteId = document.getElementById('collecteId');
            if(collecteId.value != 0){
                const event = new CustomEvent('value-changed', { detail: collecteId.value });
                document.getElementById('app').dispatchEvent(event);
            }
            function updateVueData() {
                const event = new CustomEvent('value-changed', { detail: collecteId.value });
                document.getElementById('app').dispatchEvent(event);
            }
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
