<script>
   window.addEventListener('resize', () => {
        Alpine.store('isDesktop', window.innerWidth >= 768);
    });
</script>
</body>
</html>