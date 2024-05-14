<li class="transaction">
    <div class="name">
      <h4>{{$transaction->category}}</h4>
      <p>{{$transaction->date}}</p>
    </div>

    @if ($transaction->amount > 0)
      <div class="amount income-positive">
        <span>+{{$transaction->amount}}</span>
      </div>        
    @else
      <div class="amount income-negative">
        <span>-{{$transaction->amount}}</span>
      </div>        
    @endif

    <div class="action">
      <div class="menu">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <circle cx="12" cy="12" r="10" stroke-width="1" />
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 12h6m-3-3v6"
          />
        </svg>
        <hr />
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          width="24"
          height="24"
        >
          <circle cx="12" cy="12" r="10" stroke-width="1" />
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.5"
            d="M8 8l8 8m-8 0l8-8"
          />
        </svg>
      </div>
    </div>
  </li>