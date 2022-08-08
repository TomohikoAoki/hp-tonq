<template>
<header class="header">
  <div class="header-top">
    <div id="logo"></div>
  </div>
  <nav class="header-nav">
    <ul class="header-nav__list">
      <li><a></a></li>
    </ul>
  </nav>
</header>
</template>

<style lang="scss">
.header {
    background: #16304d;
    .header-top {
        height: 130px;
        width: 100%;
        text-align: center;
        padding: 5px 0 0 0;
        #logo {
            width: 250px;
            margin: 0 auto;
        }
    }
    .header-nav {
        background-color: #250909;
        &__list {
            display: table;
            list-style: none;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 0;
            li {
                display: table-cell;
                text-align: center;
                a {
                    display: block;
                    width: 100%;
                    color: #e9e5cf;
                    padding: 10px 0;
                    font-feature-settings: "palt";
                    font-size: 1.2em;
                    font-display: swap;
                    transition: filter 0.2s ease;
                    filter: brightness(1);
                    &:hover {
                        filter: brightness(1.5);
                    }
                }
            }
        }
    }
}
</style>
