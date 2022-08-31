<template>
  <div>
    <LayoutPartsHeader></LayoutPartsHeader>
    <main>
      <Nuxt />
    </main>
    <LayoutPartsFooter id="footer"></LayoutPartsFooter>
  </div>
</template>

<script>
export default {
  mounted() {
    const element = document.getElementById("footer");
    const handler = (entries) => {
      if (entries[0].isIntersecting) {
        this.$store.dispatch("options/footerInterSect", true);
      } else {
        this.$store.dispatch("options/footerInterSect", false);
      }
    };
    const observer = new window.IntersectionObserver(handler);
    observer.observe(element);
  },
};
</script>
