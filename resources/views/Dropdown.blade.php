<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Country-State-City-Dropdown</title>
</head>
<body>
    <h2>Country-State-City-Dependent-Dropdown</h2>
    {{-- country section start here --}}
    <select name="country" id="country">
        <option value="">Select Country</option>
        @foreach ($countries as $country)
        <option value="{{$country->id}}">{{$country->country_name}}</option>
        @endforeach
    </select>
    {{-- state section --}}
    <select name="state" id="state">
        <option value="">Select State</option>
    </select>
    {{-- city section --}}
    <select name="city" id="city">
        <option value="">Select City</option>
    </select>

    {{-- jquery file added --}}
    <script src="{{asset('js/jquery.js')}}"></script>
    {{-- <script src="{{asset('assets/js/Dropdown.js')}}"></script> --}}
    <script>
        // country function start here
        $(document).ready(function(){
            $('#country').change(function(){
                var cid=$(this).val();
                $('#city').html('<option value="">Select City</option>')
                $.ajax({
                    url:'{{url("/getstate")}}',
                    type:'post',
                    data:'cid='+cid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#state').html(result)
                    }
                });
            });

            // state funtion start here
            $('#state').change(function(){
                var sid=$(this).val();
                $.ajax({
                    url:'{{url("/getcity")}}',
                    type:'post',
                    data:'sid='+sid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#city').html(result)
                    }
                });
            });
        });
    </script>
</body>
</html>
