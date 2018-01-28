<?php
require_once 'include.d/db_connect.php';
require 'include.d/functions.php';
require 'include.d/html_header.php';
require 'include.d/menu_side.php';

echo '
<table class="table table-striped text-nowrap"> <thead>
<tr><td>Skill Level</td><td>Element</td><td>Self-Assessment</td><td>Coach Assessment</td></tr>

</thead><tbody>

<tr><td>Basic 1</td><td>Sit on ice and stand up</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>March forward across the ice</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>Forward two foot glide</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>Dip</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>Forward swizzle 6-8 in a row</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>Backwards wiggles 6-8 in a row</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>Snowplow Stop</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>Rocking horse 2-3</td><td>Think I Can Do</td></tr>
<tr><td>Basic 1</td><td>Two-foot hop in place</td><td>Think I Can Do</td></tr>
<tr><td>Basic 2</td><td>Forward one foot glides R & L</td><td>Think I Can Do</td></tr>
<tr><td>Basic 2</td><td>Backwards two-foot glide</td><td>Think I Can Do</td></tr>
<tr><td>Basic 2</td><td>Backward swizzles</td><td>Think I Can Do</td></tr>
<tr><td>Basic 2</td><td>Two-foot turn forward to back in place</td><td>Think I Can Do</td></tr>
<tr><td>Basic 2</td><td>Moving snowplow stop</td><td>Think I Can Do</td></tr>
<tr><td>Basic 2</td><td>Forward alternating half swizzle pumps in a straight line</td><td>Think I Can Do</td></tr>

<tr><td>Basic 3</td><td>Forward stroking</td><td>Think I Can Do</td></tr>
<tr><td>Basic 3</td><td>Forward half swizzle on circle 6-8</td><td>Think I Can Do</td></tr>
<tr><td>Basic 3</td><td>Two foot turn - moving, forward to backward</td><td>Think I Can Do</td></tr>
<tr><td>Basic 3</td><td>Backwards one foot glides</td><td>Think I Can Do</td></tr>
<tr><td>Basic 3</td><td>Forward slalom</td><td>Think I Can Do</td></tr>
<tr><td>Basic 3</td><td>Two foot spin - 2 revolutions</td><td>Think I Can Do</td></tr>

<tr><td>Basic 4</td><td>Forward outside edge on a circle</td><td>Think I Can Do</td></tr>
<tr><td>Basic 4</td><td>Forward inside edge on a circle</td><td>Think I Can Do</td></tr>
<tr><td>Basic 4</td><td>Forward cross over clockwise & counter clockwise</td><td>Think I Can Do</td></tr>
<tr><td>Basic 4</td><td>Foward outside three turn from standing</td><td>Think I Can Do</td></tr>
<tr><td>Basic 4</td><td>Backwards half swizzle pumps on a circle clock/counter clockwise</td><td>Think I Can Do</td></tr>
<tr><td>Basic 4</td><td>Backwards stroking</td><td>Think I Can Do</td></tr>
<tr><td>Basic 4</td><td>Backwards snowplow stop</td><td>Think I Can Do</td></tr>

<tr><td>Basic 5</td><td>Backwards outside edge on a circle</td><td>Can Barely Do</td></tr>
<tr><td>Basic 5</td><td>Backwards inside edge on circle</td><td>Can Barely Do</td></tr>
<tr><td>Basic 5</td><td>Backwards cross over clockwise/counter clockwise</td><td>Think I Can Do</td></tr>
<tr><td>Basic 5</td><td>One foot spin - 3 revs</td><td>Nope</td></tr>
<tr><td>Basic 5</td><td>Hockey stop</td><td>Can Barely Do</td></tr>
<tr><td>Basic 5</td><td>Side toe hop</td><td>Nope</td></tr>

<tr><td>Basic 6</td><td>Foward inside three turn from standing</td><td>Can Barely Do</td></tr>
<tr><td>Basic 6</td><td>Moving backward to foward two-foot turn on circle, clock/counter clockwise</td><td>Think I Can Do</td></tr>
<tr><td>Basic 6</td><td>T-stop – R or L</td><td>Think I Can Do</td></tr>
<tr><td>Basic 6</td><td>Forward spiral on a straight line – R or L</td><td>Can Barely Do</td></tr>
<tr><td>Basic 6</td><td>Bunny hop</td><td>Think I Can Do</td></tr>
<tr><td>Basic 6</td><td>Forward lunge – R or L</td><td>Think I Can Do</td></tr>

<tr><td>Basic 7</td><td>Forward inside open Mohawk from a standstill position – R to L and L to R</td><td>Think I Can Do</td></tr>
<tr><td>Basic 7</td><td>Backward outside edge to forward outside edge transition on a circle – R & L</td><td>Think I Can Do</td></tr>
<tr><td>Basic 7</td><td>Ballet jump – R and L</td><td>Nope</td></tr>
<tr><td>Basic 7</td><td>Backward crossovers to a backward outside edge glides (landing position), clockwise and counterclockwise</td><td>Think I Can Do</td></tr>
<tr><td>Basic 7</td><td>Forward inside pivots – R or L</td><td>Nope</td></tr>

<tr><td>Basic 8</td><td>Moving forward outside three-turn on a circle - R & L</td><td>Think I Can Do</td></tr>
<tr><td>Basic 8</td><td>Moving forward inside three-turn on a circle – R and L</td><td>Nope</td></tr>
<tr><td>Basic 8</td><td>Combination move: Forward crossovers (2) into forward inside Mohawk, cross behind, step into backward crossover (1) and step to forward inside edge </td><td>Nope</td></tr>
<tr><td>Basic 8</td><td>One-foot upright spin, optional entry and free-foot position</td><td>Nope</td></tr>
<tr><td>Basic 8</td><td>Waltz jump</td><td>Nope</td></tr>
<tr><td>Basic 8</td><td>Mazurka – R and L</td><td>Nope</td></tr>


<tr><td>Free Skate 1</td><td>Advanced forward stroking</td><td>Nope</td></tr>
<tr><td>Free Skate 1</td><td>Basic forward outside and forward inside consecutive edges (4-6)</td><td>Nope</td></tr>
<tr><td>Free Skate 1</td><td>Advanced back outside three-turns clockwise and counterclockwise (R and L)</td><td>Nope</td></tr>
<tr><td>Free Skate 1</td><td>Scratch spin from back crossovers – three revolutions minimum</td><td>Nope</td></tr>
<tr><td>Free Skate 1</td><td>Waltz jump – from 2-3 back crossovers</td><td>Nope</td></tr>
<tr><td>Free Skate 1</td><td>Half flip</td><td>Nope</td></tr>

<tr><td>Free Skate 2</td><td>Basic back outside and back inside consecutive edges (4-6)</td><td>Nope</td></tr>
<tr><td>Free Skate 2</td><td>Forward outside and forward inside spirals, clockwise and counter clockwise (R and L)</td><td>Nope</td></tr>
<tr><td>Free Skate 2</td><td>Continuous forward progressive chasse sequence – clockwise and counterclockwise</td><td>Nope</td></tr>
<tr><td>Free Skate 2</td><td>Waltz threes, R and </td><td>Nope</td></tr>
<tr><td>Free Skate 2</td><td>Beginning back spin – two turns</td><td>Nope</td></tr>
<tr><td>Free Skate 2</td><td>Waltz jump, side toe hop, waltz jump sequence</td><td>Nope</td></tr>
<tr><td>Free Skate 2</td><td>Toe loop</td><td>Nope</td></tr>

<tr><td>Free Skate 3</td><td>Forward and backward crossovers in figure 8 pattern</td><td>Nope</td></tr>
<tr><td>Free Skate 3</td><td>Waltz 8</td><td>Nope</td></tr>
<tr><td>Free Skate 3</td><td>Advanced forward consecutive swing rolls (4-6)</td><td>Nope</td></tr>
<tr><td>Free Skate 3</td><td>Backward inside three-turn: R and L</td><td>Nope</td></tr>
<tr><td>Free Skate 3</td><td>Backspin with free foot in crossed leg position – three revolutions minimum</td><td>Nope</td></tr>
<tr><td>Free Skate 3</td><td>Salchow</td><td>Nope</td></tr>
<tr><td>Free Skate 3</td><td>Half Lutz jump</td><td>Nope</td></tr>
<tr><td>Free Skate 3</td><td>Waltz jump-toe loop combo or Salchow-toe loop combination sequence on a circle – clockwise and counterclockwise</td><td>Nope</td></tr>

<tr><td>Free Skate 4</td><td>Spiral sequence: FI spiral, FI Mohawk, BO Spiral – clockwise and counterclockwise</td><td>Nope</td></tr>
<tr><td>Free Skate 4</td><td>Forward power three-rurns: R and L</td><td>Nope</td></tr>
<tr><td>Free Skate 4</td><td>Continuous backward progressive, chasse sequence on a circle – clockwise and counterclockwise</td><td>Nope</td></tr>
<tr><td>Free Skate 4</td><td>Sit spin – three revolutions</td><td>Nope</td></tr>
<tr><td>Free Skate 4</td><td>Loop jump</td><td>Nope</td></tr>
<tr><td>Free Skate 4</td><td>Waltz jump-loop jump combination</td><td>Nope</td></tr>

<tr><td>Free Skate 5</td><td>Backward outside three-turn, Mohawk into three backward crossovers – repeat three times clockwise and counterclockwise</td><td>Nope</td></tr>
<tr><td>Free Skate 5</td><td>Spiral sequence – Forward outside spiral, forward outside three-turn, one backward crossover, back inside spiral: clockwise and counterclockwise</td><td>Nope</td></tr>
<tr><td>Free Skate 5</td><td>Forward outside slide chasse swing roll sequence – 3–6 times, alternating feet</td><td>Nope</td></tr>
<tr><td>Free Skate 5</td><td>Camel spin – three revolutions minimum</td><td>Nope</td></tr>
<tr><td>Free Skate 5</td><td>Forward upright spin to back scratch spin – three revolutions, each foot</td><td>Nope</td></tr>
<tr><td>Free Skate 5</td><td>Loop/loop combination</td><td>Nope</td></tr>
<tr><td>Free Skate 5</td><td>Flip jump</td><td>Nope</td></tr>
<tr><td>Free Skate 5</td><td>Waltz jump-falling leaf-toe loop jump sequence</td><td>Nope</td></tr>

<tr><td>Free Skate 6</td><td>Alternating back crossovers to back outside edges</td><td>Nope</td></tr>
<tr><td>Free Skate 6</td><td>Five-step Mohawk sequence – clockwise and counterclockwise</td><td>Nope</td></tr>
<tr><td>Free Skate 6</td><td>Camel-sit spin combination – four revolutions total</td><td>Nope</td></tr>
<tr><td>Free Skate 6</td><td>Split jump or stag jump</td><td>Nope</td></tr>
<tr><td>Free Skate 6</td><td>Waltz jump-half loop-Salchow</td><td>Nope</td></tr>
<tr><td>Free Skate 6</td><td>Lutz jump</td><td>Nope</td></tr>
<tr><td>Free Skate 6</td><td>Axel – walk through, preparation, jumpAxel does not need to be landed to pass this test.</td><td>Nope</td></tr>

</tbody></table>
  </body>
</html>

';
?>
