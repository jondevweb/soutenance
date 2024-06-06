<div class="card" style="width: 18rem; margin: 30px;">
                    <form class="card-body" onSubmit="entreprise()" method="post">
                        <h1>Établissement principal</h1>
                        @foreach ($user->pointCollecte as $pc)
                            <fieldset disabled>
                            <div class="form-group">
                                <label for="disabledTextInput">Raison sociale</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value='{{$pc->raison_sociale}}'>
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Siret</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value='{{$pc->siret}}'>
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Adresse</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value='{{$pc->adresse_administrative}}'>
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Adresse</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value='{{$pc->adresse_administrative}}'>
                            </div>
                            
                        </fieldset>
                        @endforeach<div class="col-auto" style="padding: 0px">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                                </div>
                    </form>
                </div> 

                <script>
            async function entreprise() {
                event.preventDefault();
                await axios.post('/api/entreprise/1712', { 
                    id: 1712,
                }, {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    // window.location.reload();
                    console.log('Data posted successfully:', response.data);
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