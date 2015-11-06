<div class="form-group">
            <input class="form-control floating-label" name="entities[{{$uniq}}][name]" type="text" placeholder="Entity name" data-hint="This will be the name of your model">
        </div>

        <legend>Configs</legend>


        <div class="checkbox">
            <label><input type="checkbox" checked name="entities[{{$uniq}}][model]">  Create Model</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][migration]">  Make Migration</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][presentable]">  Create Presenter Class</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][scaffold]">  Generate Scaffolding Views</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][media]">  Add Media Support</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][repository]">  Use Repository Patterns</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][commands]">  Use Command Bus Pattern</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][events]">  Generate Events</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][controller]">  Generate Controllers</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][requests]">  Make Validation requests</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][admin]">  Create Admin Area</label></br></br>
            <label><input type="checkbox" checked name="entities[{{$uniq}}][routes]">  Create Routes</label></br></br>
        </div>