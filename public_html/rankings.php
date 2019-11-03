<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
.pie > svg {
  width: 100px; height: 100px;
  transform: rotate(-90deg);
  background: yellowgreen;
  border-radius: 50%;
}

circle {
  fill: yellowgreen;
  stroke: #655;
  stroke-width: 32;
  stroke-dasharray: 38 100; /* for 38% */
}
</style>
</head>
<body>
<div id = "content">
  <div id = "rankings">
  <div class="pie">20%</div>
    <!--
      <div class='ranking-box'>
        <img class='profile-pic' />
      </div>
    -->
  </div>
</div>
<script>
  function $$(selector, context) { context = context || document; var elements = context.querySelectorAll(selector); return Array.prototype.slice.call(elements); }

  function createPie(very_distracted, distracted, neutral, productive, very_productive) {
    var pie = $('<div class="pie"></div>');
    var p = parseFloat(pie.textContent);
    var NS = "http://www.w3.org/2000/svg";
    var svg = document.createElementNS(NS, "svg");
    var circle = document.createElementNS(NS, "circle");
    var title = document.createElementNS(NS, "title");
    circle.setAttribute("r", 16);
    circle.setAttribute("cx", 16);
    circle.setAttribute("cy", 16);
    circle.setAttribute("stroke-dasharray", p + " 100");
    svg.setAttribute("viewBox", "0 0 32 32");
    title.textContent = pie.textContent;
    pie.textContent = '';
    svg.appendChild(title);
    svg.appendChild(circle);
    pie.appendChild(svg);
    return pie;
  }

  $.post("accounts/get_current_user_uuid.php", function(uuid) {
    getGroup(uuid);
  });
  
  function getGroup(uuid) {
    $.post("getgroup.php", {id: uuid}, function(data) {
      let rankBoxes = [];
      // contains an array of uuids of group
      data = JSON.parse(data);
      for (let i = 0; i < data.length; ++i) {
        rankBoxes.push(createRankBox(data[i]));
      }
      displayRankBoxes(rankBoxes);
    });
  }

  // TODO: Sort rank boxes and append them to ranks
  function displayRankBoxes(rankBoxes) {

  }

  function createRankBox(uuid) {
    let rankBox = $('<div></div>');
    rankBox.attr('class', 'rank-box');
    createUserPicture(uuid);
  }

  // returns a pie chart around a user's profile picture
  function createUserPicture(uuid) {
    $.post("get_user_daily_summary.php", {"user_uuid": uuid}, function(json) {
      let data = JSON.parse(json);
      let d = data[0];

      let pie = createPie(d.very_distracting_percentage, d.distracting_percentage, d.neutral_percentage, d.productive_percentage, d.very_productive_percentage);
      
    });
  }
  // $(function(){createPies()});
</script>
</body>
</html>