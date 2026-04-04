<h1>Surgeries</h1>

<form method="POST" action="{{ route('surgeries.store') }}">
    @csrf
    <input type="text" name="patient_name" placeholder="Patient Name" required>
    <input type="text" name="doctor_name" placeholder="Doctor Name" required>
    <input type="date" name="surgery_date" required>
    <input type="text" name="room" placeholder="Room" required>
    <button type="submit">Add Surgery</button>
</form>

<hr>

@foreach($surgeries as $surgery)
    <p>
        {{ $surgery->patient_name }} |
        {{ $surgery->doctor_name }} |
        {{ $surgery->surgery_date }} |
        Room: {{ $surgery->room }}
    </p>
@endforeach