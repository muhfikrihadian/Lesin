<form action="{{ route('murid.depositMuridAction') }}" method="post">
  {{ csrf_field() }}
  <h1 class="h4 mb-4 text-left">Nomor Rekening: <span class="font-weight-bold">0193184917987</span></h1>
  <div class="form-group">
    <select class="custom-select" name="lesco" required>
      <option value="" selected disabled>Pilih Nominal Isian</option>
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
  <button type="submit" class="btn btn-success float-left" name="button">Topup Sekarang</button>
</form>
