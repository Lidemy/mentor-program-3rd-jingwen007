<?php
function isTokenValid($token) {
            if (strlen($token) !== 8) return false;
            for($i = 1; $i <= 7; $i+=2) {
              if ((ord($token[$i]) * ord($token[$i - 1])) % $i !== 0) {
                return false;
              }
            }
            return true;
          }
?>