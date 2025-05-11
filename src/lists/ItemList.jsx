import React, { useState } from 'react';

function Operation({ operations }) {
  const [result, setResult] = useState(0);

  const handleOperationClick = (operation) => {
    setResult(result => result + operation);
  };

  return (
    <div>
      <h1>Opérations</h1>
      <ul>
        {operations.map((operation, index) => (
          <li key={index}>
            <button onClick={() => handleOperationClick(operation)}>{operation}</button>
          </li>
        ))}
      </ul>
      <p>Résultat : {result}</p>
    </div>
  );
}

const operations = [1, 2, 3, 4, 5];

function App() {
  return (
    <Operation operations={operations} />
  );
}

export default App;