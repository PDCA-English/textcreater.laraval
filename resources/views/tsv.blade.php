
<body>
  <div id="app">
    <input type="file" @change="loadCsvFile" />
    <p id="message"></p>
 
    <table border="1">
      {{-- <tr v-for="(worker, index) in workers" :key="index"> --}}
        {{-- <td v-for="(column, index) in worker" :key="index" id="column"></td> --}}
      @foreach ($workers as $index => $worker)
        @foreach ($workers as $index => $worker)
        @endforeach
      @endforeach
      
      </tr>
    </table>
  </div>
</body>
 
<script>
  new Vue({
    el: '#app',
    data: {
        message: "",
        workers: []
      },
    methods: {
      loadCsvFile(e) {
        let vm = this;
        vm.workers = [];
        vm.message = "";
        let file = e.target.files[0];
  
        if (!file.type.match("text/csv")) {
          vm.message = "CSVファイルを選択してください";
          return;
        }
  
        let reader = new FileReader();
        reader.readAsText(file);
  
        reader.onload = () => {
          let lines = reader.result.split("\n");
          lines.shift();
          let linesArr = [];
          for (let i = 0; i < lines.length; i++) {
            linesArr[i] = lines[i].split("");
          }
          vm.workers = linesArr;
        };
      }
    }
  )};
</script>