@extends('layouts/master')
@section('content')
    <div class="col-md-12">
        <form id="client-form">
            <p class="text-success" id="success_message"></p>
            <p class="text-danger" id="danger_message"></p>
            <div class="form-group">
                <label for="email">Enter email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <button type="submit" id="send" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="{{asset('js/send-form.js')}}"></script>
@endsection

