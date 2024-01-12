<div class="col-lg-4">
  <div class="blog-widget blog-search bg-white">
    <form>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
        <button>
          <i class='bx bx-search-alt-2'></i>
        </button>
      </div>
    </form>
  </div>
  <div class="blog-widget blog-category bg-white">
    <h3>Tahap Seleksi</h3>
    <ul>
      <li class="{{ $collapse === 'st1' ? 'bg-blue' : 'bg-white' }}">
        <a href="{{ route('st.index', ['id' => 1]) }}"> <i class="fas fa-1 fa-fw"></i> &nbsp; Seleksi Tahap 1</a>
        <span>(1)</span>
      </li>
      <li class="{{ $collapse === 'st2' ? 'bg-blue' : 'bg-white' }}">
        <a href="{{ route('st.index', ['id' => 2]) }}"> <i class="fas fa-2 fa-fw"></i> &nbsp; Seleksi Tahap 2</a>
        <span></span>
      </li>
      <li class="{{ $collapse === 'gi' ? 'bg-blue' : 'bg-white' }}">
        <a href="{{ route('st.index', ['id' => 'gi']) }}"> <i class="fas fa-users fa-fw"></i> &nbsp; Group Interview</a>
        <span></span>
      </li>
      <li class="{{ $collapse === 'sta' ? 'bg-blue' : 'bg-white' }}">
        <a href="{{ route('st.index', ['id' => 'akhir']) }}"> <i class="fas fa-list-check fa-fw"></i> &nbsp; Seleksi Tahap Akhir</a>
        <span></span>
      </li>
      <li>
        <a href="https://merryriana.com/birdtest/" target="_BLANK"> <i class="fas fa-dove fa-fw"></i> &nbsp; Bird test</a>
      </li>
    </ul>
  </div>
</div>