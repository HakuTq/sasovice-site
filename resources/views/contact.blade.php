@extends('layouts.guest')

@section('content')
<div class="contact-section">
  <div class="section-container">
    <h2 class="contact-heading">Kontaktní osoby</h2>
    
    <div class="contact-container">
      {{-- Contact Card 1 --}}
      <div class="contact-card">
        <div class="card-header">
          <h3 class="contact-name">Jan Novák</h3>
          <p class="contact-position">Předseda spolku</p>
        </div>
        
        <div class="card-body">
          <div class="contact-info">
            <div class="info-item">
              <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <div class="info-content">
                <div class="info-label">Telefon</div>
                <div class="info-value">+420 123 456 789</div>
              </div>
            </div>
            
            <div class="info-item">
              <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <div class="info-content">
                <div class="info-label">Email</div>
                <div class="info-value">novak@spolksasovice.cz</div>
              </div>
            </div>
            
            <div class="info-item">
              <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <div class="info-content">
                <div class="info-label">Kancelář</div>
                <div class="info-value">Úřad č. 15, Šašovice</div>
              </div>
            </div>
          </div>
          
          <div class="contact-description">
            Předseda spolku od roku 2018. Specializuje se na péči o spárkatou zvěř a organizaci společných lovů.
          </div>
        </div>
        
        <div class="card-footer">
          <a href="mailto:novak@spolksasovice.cz" class="contact-action">
            <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Napsat email
          </a>
          
          <a href="tel:+420123456789" class="contact-action">
            <svg class="action-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            Zavolat
          </a>
        </div>
      </div>

      {{-- Contact Card 2 --}}
      <div class="contact-card">
        <div class="card-header">
          <h3 class="contact-name">Petr Svoboda</h3>
          <p class="contact-position">Jednatel</p>
        </div>
        
        <div class="card-body">
          <div class="contact-info">
            {{-- Similar structure as first card --}}
          </div>
          
          <div class="contact-description">
            Jednatel spolku s dlouholetou praxí. Zodpovědný za administrativu a komunikaci s úřady.
          </div>
        </div>
        
        <div class="card-footer">
          {{-- Action buttons similar to first card --}}
        </div>
      </div>

      {{-- Contact Card 3 --}}
      <div class="contact-card">
        <div class="card-header">
          <h3 class="contact-name">Marie Kovářová</h3>
          <p class="contact-position">Hospodář</p>
        </div>
        
        <div class="card-body">
          <div class="contact-info">
            {{-- Similar structure as first card --}}
          </div>
          
          <div class="contact-description">
            Hospodářka zodpovědná za krmení zvěře a údržbu zařízení v honitbě. Specialista na péči o pernatou zvěř.
          </div>
        </div>
        
        <div class="card-footer">
          {{-- Action buttons similar to first card --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection