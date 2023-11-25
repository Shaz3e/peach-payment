<form action="{{ route('peachpayment.post') }}" method="get">
    @csrf
    <input type="text" name="amount" value="10">
    <button type="submit">Pay</button>
</form>