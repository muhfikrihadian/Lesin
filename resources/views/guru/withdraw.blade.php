<form action="{{ route('guru.withdrawGuruAction') }}" method="post">
  {{ csrf_field() }}
  <h1 class="h3 mb-4 text-left">Uangmu Akan Langsung Dikirim Ke Rekeningmu </h1>
  <div class="form-group">
    <select class="custom-select" name="lesco" required>
      <option value="" selected disabled>Pilih Nominal Transfer Lesco</option>
      <option value="100">100</option>
      <option value="200">200</option>
      <option value="300">300</option>
      <option value="400">400</option>
      <option value="500">500</option>
      <option value="600">600</option>
      <option value="700">700</option>
      <option value="800">800</option>
      <option value="900">900</option>
      <option value="1000">1000</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success float-left" name="button">Withdraw Sekarang</button>
</form>
