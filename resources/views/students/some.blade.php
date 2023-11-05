@include('partials.__header')
@include('partials.__navbar')
    
  <button id="randomPatternButton">Click for a Random Pattern</button>
<p id="displayPattern"></p>


<script>
  fetch('http://127.0.0.1:8000/json/intents.json')
    .then(response => response.json())
    .then(data => {
        let x = 0;
        while(x <= 3){
          for (const element of data.intents) {
            if(Math.floor(Math.random() * 2)){
              const index = Math.floor(Math.random() * (element.patterns.length));
              document.querySelector('#displayPattern').innerText += element.patterns[index];
              x++;
            }
            if(x == 3){
              break
            }
          }
          if(x == 3){
            break
          }
        };
    })
    .catch(error => {
        console.error('Error loading JSON file:', error);
    });

</script>
</body>
</html>