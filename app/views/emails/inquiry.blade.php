Name: {{ $name }} <br><br>
Company: {{ $company }}  <br><br>
TEL: {{ $tel }} <br><br>
E-mail: {{ $email }} <br><br>
Products:  <br><br>
@foreach($products as $t)
    {{ $t }} <br><br>
@endforeach
