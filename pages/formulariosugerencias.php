
         
        <script type="text/javascript">
        
        
        //Si el checkbox esta marcado 
        function checkifempty()
        {
            
            if (!document.form1.condicion.checked)
          {
              //deshabilitado a true
            document.form1.registrarse.disabled=true;
          }
            else
          {     
              //deshabilitado a false
            document.form1.registrarse.disabled=false;
          }
         
        }
        
        </script>
<p style="text-align:justify;font-weight:bold; font-size:20px;border:dotted white 5px;padding:5px;" class='titulo'>FORMULARIO DE SUGERENCIAS</p>
        <form id="form1" name="form1" action="./pages/mail.php" method="POST">
        <table>
        <tr>
        <td>
                        <label>Correo electrónico:</label>
                    </td>
                    <td>
                    <input type="email" name="mail" id="mail" value="tienda_pollos@gmail.com" readonly >
					    </td>
      </tr>
      <tr>
        <td>
                        <label>Sugerencia</label>
                    </td>
                    <td>
                    <textarea placeholder="Escribe aquí tú sugerencía (solo letras)" style="resize:none;" name="com" id="com" cols="25" rows="5" required pattern="^[a-zA-z]$" ></textarea>

            
              </td>
              <td>
              Aceptas los terminos y <a href="index.php?p=condiciones">Condiciones de uso de tus datos.</a>    <input type="checkbox" name="condicion" id="condicion" onclick="checkifempty()" required/>
              </td> 
      </tr>  
       
      <tr>
                    <td colspan=2 id="enviar">
                        <input type="submit" name="registrarse" id="registrarse" disabled="true">
                    </td>
                    <td></td>
                </tr>
        </table> 
        <br> 
       
      </form>