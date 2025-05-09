import React, { useState } from 'react';

function StackTest() {
  const [stack, setStack] = useState([]);

  // Fonction pour ajouter un élément à la pile
  function addToStack(element) {
    setStack((prevStack) => [...prevStack, element]);
  }

  // Fonction pour retirer l'élément de la pile
  function popFromStack() {
    if (stack.length > 0) {
      const lastElement = stack[stack.length - 1];
      setStack((prevStack) => prevStack.slice(0, stack.length - 1));
      return lastElement;
    } else {
      return null;
    }
  }

  // Fonction pour afficher la pile dans l'ordre inverse
  function displayReverse() {
    const reverseStack = [...stack].reverse();
    setStack(reverseStack);
  }

  return (
    <div>
      <h1>Pile de test</h1>
      <button onClick={() => addToStack('premier élément')}>Ajouter premier élément</button>
      <button onClick={() => addToStack('deuxième élément')}>Ajouter deuxième élément</button>
      <button onClick={() => popFromStack()}>Retirer élément de la pile</button>
      <button onClick={() => displayReverse()}>Afficher la pile dans l'ordre inverse</button>
      <ul>
        {stack.map((element, index) => (
          <li key={index}>{element}</li>
        ))}
      </ul>
    </div>
  );
}