<aside>
    <div class="sidebar-top">
        <a href="#" class="logo__wrapper">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo">
            <h1 class="hide">LA SEMEUSE</h1>
        </a>
        {{-- <div class="expand-btn">
            <svg style="width:24px; height:24px; fill:#0057a7;"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256 438.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z"></path>
            </svg>
        </div> --}}
    </div>
    <div class="sidebar-links">
        <ul>
            <li>
                <a href="{{ route('auth.banners.index') }}" title="Gestion des bannières" class="tooltip {{ $page == 'banners' ? 'active' : '' }}">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M256 0H576c35.3 0 64 28.7 64 64V288c0 35.3-28.7 64-64 64H256c-35.3 0-64-28.7-64-64V64c0-35.3 28.7-64 64-64zM476 106.7C471.5 100 464 96 456 96s-15.5 4-20 10.7l-56 84L362.7 169c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h80 48H552c8.9 0 17-4.9 21.2-12.7s3.7-17.3-1.2-24.6l-96-144zM336 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM64 128h96V384v32c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V384H512v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192c0-35.3 28.7-64 64-64zm8 64c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V312c0-8.8-7.2-16-16-16H72zm0 104c-8.8 0-16 7.2-16 16v16c0 8.8 7.2 16 16 16H88c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H72zm336 16v16c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16V416c0-8.8-7.2-16-16-16H424c-8.8 0-16 7.2-16 16z"></path>
                    </svg>
                    <span class="link hide">Gestion des bannières</span>
                    <span class="tooltip__content">Gestion des bannières</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth.about.index') }}" title="Qui sommes-nous" class="tooltip text-slate-800  {{ $page == 'about' ? 'active' : '' }}">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"></path>
                    </svg>
                    <span class="link hide">Qui sommes-nous</span>
                    <span class="tooltip__content">Qui sommes-nous</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth.realisations.index') }}" title="Nos réalisations" class="tooltip  {{ $page == 'realisations' ? 'active' : '' }}">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path>
                    </svg>
                    <span class="link hide">Nos réalisations</span>
                    <span class="tooltip__content">Nos réalisations</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth.phototeque.index') }}" title="phototèque" class="tooltip" {{ $page == 'phototeque' ? 'active' : '' }}>
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm96 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm69.2 46.9c-3-4.3-7.9-6.9-13.2-6.9s-10.2 2.6-13.2 6.9l-41.3 59.7-11.9-19.1c-2.9-4.7-8.1-7.5-13.6-7.5s-10.6 2.8-13.6 7.5l-40 64c-3.1 4.9-3.2 11.1-.4 16.2s8.2 8.2 14 8.2h48 32 40 72c6 0 11.4-3.3 14.2-8.6s2.4-11.6-1-16.5l-72-104z"></path>
                    </svg>
                    <span class="link hide">Phototèque</span>
                    <span class="tooltip__content">Phototèque</span>
                </a>
            </li>
            {{-- <li>
                <a href="#funds" title="actualites" class="tooltip">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M168 80c-13.3 0-24 10.7-24 24V408c0 8.4-1.4 16.5-4.1 24H440c13.3 0 24-10.7 24-24V104c0-13.3-10.7-24-24-24H168zM72 480c-39.8 0-72-32.2-72-72V112C0 98.7 10.7 88 24 88s24 10.7 24 24V408c0 13.3 10.7 24 24 24s24-10.7 24-24V104c0-39.8 32.2-72 72-72H440c39.8 0 72 32.2 72 72V408c0 39.8-32.2 72-72 72H72zM176 136c0-13.3 10.7-24 24-24h96c13.3 0 24 10.7 24 24v80c0 13.3-10.7 24-24 24H200c-13.3 0-24-10.7-24-24V136zm200-24h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H376c-13.3 0-24-10.7-24-24s10.7-24 24-24zM200 272H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zm0 80H408c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24z"></path>
                      </svg>
                    <span class="link hide">Actualités</span>
                    <span class="tooltip__content">Actualités</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('auth.newsletter.index') }}" title="newsletter" class="tooltip" {{ $page == 'newsletters' ? 'active' : '' }}>
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"></path>
                      </svg>
                    <span class="link hide">Newsletter</span>
                    <span class="tooltip__content">Newsletter</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth.invoiceIndex') }}" title="devis" class="tooltip {{ $page == 'invoice' ? 'active' : '' }}">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"></path>
                    </svg>
                    <span class="link hide">Demande de devis</span>
                    <span class="tooltip__content">Demande de devis</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth.users.index') }}" title="Administrateurs" class="tooltip {{ $page == 'users' ? 'active' : '' }}">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z"></path>
                      </svg>
                    <span class="link hide">Administrateurs</span>
                    <span class="tooltip__content">Administrateurs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('auth.teams.index') }}" title=" Notre Equipe" class="tooltip {{ $page == 'teams' ? 'active' : '' }}">
                    <svg style="width:24px; height:24px; fill:#fff;"  viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"></path>
                    </svg>
                    <span class="link hide"> Notre Equipe</span>
                    <span class="tooltip__content"> Notre Equipe</span>
                </a>
            </li>
            <li>
                <a href="#!" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" title="Se déconnecter" class="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="link hide">Se déconnecter</span>
                    <span class="tooltip__content">Se déconnecter</span>
                </a>
                <form action="{{ route('auth.users.logout') }}" method="post" id="logoutForm" hidden>
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="sidebar-bottom">
        <div class="sidebar__profile">
            <div class="avatar__wrapper">
            <img class="avatar" src="{{ session()->get("avatar")
            ? asset('storage/app/public' . session()->get("avatar"))
            : asset('assets/images/avatar-default.png') }}" alt="Profile">
            <div class="online__status"></div>
        </div>
        <div class="avatar__name hide">
            <div class="user-name">{{ session()->get("name") }}</div>
            <div class="email">{{ session()->get("email") }}</div>
        </div>
    </div>
</aside>
