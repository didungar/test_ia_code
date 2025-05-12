javascript
// Importation du fichier mathOperations.js
import * as math from './mathOperations';

function ArithmeticCalculator() {
  // Utilisation de la méthode add de la librairie math pour effectuer l'addition
  const result = math.add(2, 3);

  return (
    <div>
      <h1>{result}</h1>
    </div>
  );
}