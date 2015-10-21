<h3>Step 1 : App info</h3>
<hr>

        <legend>Name and namespace</legend>
        <div class="form-group">
            <input class="form-control floating-label" id="application" type="text" name="application" placeholder="Application name">
        </div>
        <div class="form-group">
            <input class="form-control floating-label" id="psr4" name="psr4" type="text" placeholder="Psr-4 autoloading" data-hint="This is the psr4 namespace you will place in composer.json">
        </div>

        <legend>Common packages</legend>


        <div class="checkbox">
            <label><input type="checkbox" checked name="flash">  laracasts/flash</label></br></br>
            <label><input type="checkbox" checked name="html">  illuminate/html</label></br></br>
            <label><input type="checkbox" checked name="presenter">  laracasts/presenter</label></br></br>
            <label><input type="checkbox" checked name="debugbar">  barryvdh/laravel-debugbar</label></br></br>
            <label><input type="checkbox" checked name="medialibrary">  spatie/laravel-medialibrary</label></br></br>
        </div>


        