<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css">
  <style>
   /*
 * We'll use CSS grids for the base template
 * More info on https://cssgrid.io/ by @wesbos
 */
#main {
  display: grid;
  grid-template-columns: 6rem auto;
  /* Or grid-template-columns: config('width.24') auto; */
}

@media (min-width: 1200px) { 
/* Or @media (min-width: config('screens.xl')) { */
  
  #main { grid-template-columns: 12rem auto; }
  /* Or #main { grid-template-columns: config('width.48') auto; } */
}

a {
  text-decoration: none;
  /* Or @apply .no-underline; */
}

/* Just a new padding size */
.pt-16 {
  padding-top: 4rem;
}

/*
 * Just some customized new utilities needed for the submenus
 * Add this before
 */
.top-full { top: 100%; }
.left-full { left: 100%; }

/*
 * This hacks is just needed in Codepen because the previous rules are prioritary to xl:pin-none.
 * In your own config this should not be needed.
 */

@media (min-width: 1200px) {
  .xl\:pin-none { left: auto; }
}

/* 
 * Active "group-hover" for the "display" module in your
 * tailwind.js config file like this:
 * 
 * display: ['responsive', 'group-hover']
 *
 * More info on https://tailwindcss.com/docs/state-variants/#group-hover
 */
.group:hover .group-hover\:block {
  display: block;
}
  </style>
</head>
<body>
<div class="font-sans antialiased h-screen">
  <!-- Top Navigation -->
  <header class="fixed z-50 h-16 w-full bg-grey-darker shadow flex items-center justify-between">
    <div class="flex items-center h-full">
        <div class="flex items-center text-center h-full w-48 border-r border-grey-dark">
            <span class="w-full text-white text-sm uppercase font-extrabold">WEBARTISAN.BE</span>
        </div>
        <div class="flex items-center w-64">
            <form action="" class="w-full h-full px-3 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-white fill-current"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
              <input type="search" class="appearance-none bg-grey-darker h-full w-full py-2 px-2 text-white" placeholder="Search...">
            </form>
        </div>
    </div>
    <div class="flex items-center h-full text-sm">
        <div class="flex items-center h-full">
            <a href="#" class="flex items-center text-white h-full px-4">Support</a>
            <div class="group relative h-full">
                <a href="#" class="text-white flex items-center h-full bg-grey-darkest px-4">
                    Account
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-grey-darker fill-current ml-1"><path class="heroicon-ui" d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"/></svg>
                </a>
                <div class="hidden group-hover:block absolute pin-r top-full w-48 bg-black">
                    <a href="#" class="block text-left py-3 px-3 text-white hover:text-blue-dark text-xs">
                        My Account
                    </a>
                    <a href="#" class="block text-left py-3 px-3 text-white hover:text-blue-dark text-xs">
                        Edit Account
                    </a>
                    <a href="#" class="block text-left py-3 px-3 text-white hover:text-blue-dark text-xs">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
  </header>
  
  <div id="main" class="pt-16">
    <!-- Sidebar -->
    <div class="bg-grey-darkest relative h-full min-h-screen">
      <div class="xl:py-2">
        <div class="hidden xl:block uppercase font-bold text-grey-darker text-xs px-4 py-2">
          Main
        </div>
        <div class="group relative sidebar-item with-children">
          <a href="#" class="block xl:flex xl:items-center text-center xl:text-left shadow-light xl:shadow-none py-6 xl:py-2 xl:px-4 border-l-4 border-transparent hover:bg-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-grey-darker fill-current xl:mr-2"><path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM5.68 7.1A7.96 7.96 0 0 0 4.06 11H5a1 1 0 0 1 0 2h-.94a7.95 7.95 0 0 0 1.32 3.5A9.96 9.96 0 0 1 11 14.05V9a1 1 0 0 1 2 0v5.05a9.96 9.96 0 0 1 5.62 2.45 7.95 7.95 0 0 0 1.32-3.5H19a1 1 0 0 1 0-2h.94a7.96 7.96 0 0 0-1.62-3.9l-.66.66a1 1 0 1 1-1.42-1.42l.67-.66A7.96 7.96 0 0 0 13 4.06V5a1 1 0 0 1-2 0v-.94c-1.46.18-2.8.76-3.9 1.62l.66.66a1 1 0 0 1-1.42 1.42l-.66-.67zM6.71 18a7.97 7.97 0 0 0 10.58 0 7.97 7.97 0 0 0-10.58 0z" class="heroicon-ui"></path></svg>
            <div class="text-white text-xs">Dashboard</div>
          </a>
        </div>
        <div class="group relative sidebar-item with-children">
          <a href="#" class="block xl:flex xl:items-center text-center xl:text-left shadow-light xl:shadow-none py-6 xl:py-2 xl:px-4 border-l-4 border-blue-dark xl:bg-black bg-black xl:opacity-75">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-grey-darker fill-current xl:mr-2"><path d="M15 19a3 3 0 0 1-6 0H4a1 1 0 0 1 0-2h1v-6a7 7 0 0 1 4.02-6.34 3 3 0 0 1 5.96 0A7 7 0 0 1 19 11v6h1a1 1 0 0 1 0 2h-5zm-4 0a1 1 0 0 0 2 0h-2zm0-12.9A5 5 0 0 0 7 11v6h10v-6a5 5 0 0 0-4-4.9V5a1 1 0 0 0-2 0v1.1z" class="heroicon-ui"></path></svg>
            <div class="text-white text-xs">Notifications</div>
          </a>
          <div class="absolute xl:relative hidden xl:block pin-t left-full xl:pin-none w-48 xl:w-auto group-hover:block bg-black z-50 xl:z-auto">
            <a href="#" class="block text-left xl:flex xl:items-center shadow xl:shadow-none py-3 px-3 xl:px-4 border-l-4 border-transparent text-white hover:text-blue-dark text-xs">
              All Notification
            </a>
            <a href="#" class="block text-left xl:flex xl:items-center shadow xl:shadow-none py-3 px-3 xl:px-4 border-l-4 border-transparent text-white hover:text-blue-dark text-xs">
              Friends
            </a>
            <a href="#" class="block text-left xl:flex xl:items-center shadow xl:shadow-none py-3 px-3 xl:px-4 border-l-4 border-transparent text-white hover:text-blue-dark text-xs">
              Other
            </a>
          </div>
        </div>
        <div class="group relative sidebar-item with-children">
          <a href="#" class="block xl:flex xl:items-center text-center xl:text-left shadow-light xl:shadow-none py-6 xl:py-2 xl:px-4 border-l-4 border-transparent hover:bg-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-grey-darker fill-current xl:mr-2"><path d="M2 15V5c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v15a1 1 0 0 1-1.7.7L16.58 17H4a2 2 0 0 1-2-2zM20 5H4v10h13a1 1 0 0 1 .7.3l2.3 2.29V5z" class="heroicon-ui"></path></svg>
            <div class="text-white text-xs">Comments</div>
          </a>
        </div>
      </div>
      <!-- Secondary Menu -->
      <div class="xl:py-2">
        <div class="hidden xl:block uppercase font-bold text-grey-darker text-xs px-4 py-2">
          Secondary
        </div>
        <div class="group relative sidebar-item with-children">
          <a href="#" class="block xl:flex xl:items-center text-center xl:text-left shadow-light xl:shadow-none py-6 xl:py-2 xl:px-4 border-l-4 border-transparent hover:bg-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-grey-darker fill-current xl:mr-2"><path d="M12 18.62l-6.55 3.27A1 1 0 0 1 4 21V4c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v17a1 1 0 0 1-1.45.9L12 18.61zM18 4H6v15.38l5.55-2.77a1 1 0 0 1 .9 0L18 19.38V4z" class="heroicon-ui"></path></svg>
            <div class="text-white text-xs">Bookmarks</div>
          </a>
        </div>
        <div class="group relative sidebar-item with-children">
          <a href="#" class="block xl:flex xl:items-center text-center xl:text-left shadow-light xl:shadow-none py-6 xl:py-2 xl:px-4 border-l-4 border-transparent hover:bg-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-grey-darker fill-current xl:mr-2"><path d="M20 11.46V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-4h-2v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8.54A4 4 0 0 1 2 8V7a1 1 0 0 1 .1-.45l2-4A1 1 0 0 1 5 2h14a1 1 0 0 1 .9.55l2 4c.06.14.1.3.1.45v1a4 4 0 0 1-2 3.46zM18 12c-1.2 0-2.27-.52-3-1.35a3.99 3.99 0 0 1-6 0A3.99 3.99 0 0 1 6 12v8h3v-4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v4h3v-8zm2-4h-4a2 2 0 1 0 4 0zm-6 0h-4a2 2 0 1 0 4 0zM8 8H4a2 2 0 1 0 4 0zm11.38-2l-1-2H5.62l-1 2h14.76z" class="heroicon-ui"></path></svg>
            <div class="text-white text-xs">Store</div>
          </a>
        </div>
        <div class="group relative sidebar-item with-children">
          <a href="#" class="block xl:flex xl:items-center text-center xl:text-left shadow-light xl:shadow-none py-6 xl:py-2 xl:px-4 border-l-4 border-transparent hover:bg-black">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-6 w-6 text-grey-darker fill-current xl:mr-2"><path d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z" class="heroicon-ui"></path></svg>
            <div class="text-white text-xs">Users</div>
          </a>
        </div>
      </div>
      <!-- Other Links -->
      <div class="py-4">
        <div class="hidden xl:block uppercase font-bold text-grey-darker text-xs px-4 py-2">
          Action
        </div>
        <div class="px-2">
          <a href="#" class="flex items-center justify-center py-2 w-full text-xs text-center text-white block bg-blue hover:bg-blue-dark rounded shadow-light font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 mr-1 fill-current"><path d="M17 11a1 1 0 0 1 0 2h-4v4a1 1 0 0 1-2 0v-4H7a1 1 0 0 1 0-2h4V7a1 1 0 0 1 2 0v4h4z" class="heroicon-ui"></path></svg>
            Button
          </a>
        </div>
      </div>
    </div>
    
    <!-- Content -->
    <div class="bg-white h-full pt-8">
      <div class="text-center w-full text-grey-darkest">
        <p class="py-2">Hope you like this!</p>
        <p class="py-2"><a href="https://github.com/sschoger/heroicons-ui" class="text-black font-bold">Hero Icons</a> by <a href="https://twitter.com/steveschoger" class="text-black font-bold">Steve Schoger</a></p>
        <p class="py-2">Adaptation of <a href="https://codyhouse.co/demo/responsive-sidebar-navigation/index.html" class="text-black font-bold">a CodyHouse Demo</a></p>
      <p class="py-2 text-sm">Made by <a href="https://webartisan.be" class="text-black font-bold">Simon Depelchin</a>, <a href="https://twitter.com/SimonDepelchin" class="text-black font-bold">@SimonDepelchin</a> on Twitter</p>
    </div>
  </div>
</div>
</body>
</html>
