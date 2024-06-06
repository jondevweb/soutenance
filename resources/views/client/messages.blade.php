<div class="card" style="width: 18rem; margin: 30px;">
    <form class="card-body">
        <fieldset disabled>
            <div class="form-group">
                <label for="disabledTextInput">Nom :</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value={{$user->nom}}>
            </div>
            <div class="form-group">
                <label for="disabledTextInput">Prenom : </label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value={{$user->prenom}}>
            </div>
            <div class="form-group">
                <label for="disabledTextInput">Mail :</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value={{$user->email}}>
            </div>
            <div class="form-group">
                <label for="disabledTextInput">Telephone :</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value={{$user->telephone}}>
            </div>
        </fieldset>
    </form>
</div>   