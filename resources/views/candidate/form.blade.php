<h1> {{$Modo}} Candidate </h1>
<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ isset($candidate->name)?$candidate->name:'' }}">
</div>
<div class="form-group">
    <label for="surname">Surname:</label>
    <input type="text" class="form-control" name="surname" id="surname" value="{{ isset($candidate->surname)?$candidate->surname:'' }}">
</div>
<div class="form-group">
    <label for=e"mail">Email:</label>
    <input type="text" class="form-control" name="email" id="email" value="{{ isset($candidate->email)?$candidate->email:'' }}">
</div>
<div class="form-group">
    <label for="date">Date of Interview</label>
    <input type="date" class="form-control" name="date" id="date" value="{{ isset($candidate->date)?$candidate->date:'' }}">
</div>
<div class="form-group">
    <label for="rating">Rating:</label>
    <input type="text" class="form-control" name="rating" id="rating" value="{{ isset($candidate->rating)?$candidate->rating:'' }}">
</div>
<div class="form-group">
    <label for="photo">Photo:</label>
    @if(isset($candidate->photo))
    <img src="{{ asset('storage').'/'.$candidate->photo }}" class="img-thumbnail img-fluid" alt="" width="100">
    @endif
    <input type="file" name="photo" id="photo">
</div>


<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{$Modo}}">
    |
    <a href="{{ url('candidate/') }}" class="btn btn-primary">Go Back</a>

</div>