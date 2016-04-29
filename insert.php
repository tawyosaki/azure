<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:299px;
	top:10px;
	width:386px;
	height:283px;
	z-index:1;
}
-->
</style>
<div id="Layer1">
  <table width="304" height="278" border="0">
    <tr>
      <td width="98">Username</td>
      <td width="13">:</td>
      <td width="179"><form name="Registration" action="simpan.php" method="post">
        <input name="username" type="text" id="username" />
      </form>      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><form id="form2" name="form2" method="post" action="">
        <input name="password" type="password" id="password" />
      </form>      </td>
    </tr>
    <tr>
      <td>Full Name </td>
      <td>:</td>
      <td><form id="form3" name="form3" method="post" action="">
        <input name="nama" type="text" id="nama" />
      </form>      </td>
    </tr>
    <tr>
      <td>Birth</td>
      <td>:</td>
      <td><form id="form8" name="form8" method="post" action="">
        <input name="tgllahir" type="text" id="tgllahir" />
      </form>
      </td>
    </tr>
    <tr>
      <td>Blood type </td>
      <td>:</td>
      <td><form id="form4" name="form4" method="post" action="">
        <select name="goldar" id="goldar">
          <option>A</option>
          <option>B</option>
          <option>O</option>
          <option>AB</option>
        </select>
      </form>      </td>
    </tr>
    <tr>
      <td>Status</td>
      <td>:</td>
      <td><form id="form5" name="form5" method="post" action="">
        <select name="status" id="status">
          <option>-</option>
          <option>Married</option>
          <option>Single</option>
          <option>Complicated</option>
        </select>
      </form>      </td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>:</td>
      <td><input name="jk" type="radio" value="radiobutton" />
Male
  <input name="jk" type="radio" value="radiobutton" />
Female </td>
    </tr>
    <tr>
      <td>About you </td>
      <td>:</td>
      <td><form id="form6" name="form6" method="post" action="">
        <textarea name="about" id="about"></textarea>
      </form>
      </td>
    </tr>
  </table>
  <form id="form7" name="form7" method="post" action="">
    <input type="submit" name="Submit" value="Submit" />
  </form>
  <p>&nbsp;</p>
</div>
