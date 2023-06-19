<h1>Ciao admin!</h1>
<p>
    Hai ricevuto un nuovo messaggio, ecco qui i dettagli:<br>
    Nome: {{ $lead->name }}<br>
    Email: {{ $lead->address }}<br>
    Messaggio:<br>
    {{ $lead->message }}
</p>
