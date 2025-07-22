@extends('layouts.guest')

@section('content')
<div class="contact-section">
  <div class="section-container">
    <h2 class="contact-heading">Kontaktní osoby</h2>
    
    <div class="contact-container">
      @foreach ($contacts as $contact)
        <div class="contact-card">
          <div class="card-header">
            <h3 class="contact-name">{{ $contact['name'] }}</h3>
            <p class="contact-position">{{ $contact['position'] }}</p>
          </div>
          
          <div class="card-body">
            <div class="contact-info">
              <div class="info-item">
                <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <div class="info-content">
                  <div class="info-label">Telefon</div>
                  <div class="info-value">{{ $contact['phone'] }}</div>
                </div>
              </div>
              
              <div class="info-item">
                <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <div class="info-content">
                  <div class="info-label">Email</div>
                  <div class="info-value">{{ $contact['email'] }}</div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="card-footer">
            <a href="mailto:{{ $contact['email'] }}" class="contact-action">
              <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              Napsat email
            </a>
            
            <a href="tel:{{ $contact['phone'] }}" class="contact-action">
              <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              Zavolat
            </a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="pagination">
        {{ $contacts->links() }}
    </div>
  </div>
</div>
@endsection