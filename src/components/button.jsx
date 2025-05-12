import React, { useState } from 'react';

function ClearButton() {
  const [isClearing, setIsClearing] = useState(false);

  const handleClick = () => {
    setIsClearing(true);
    // Votre code pour effacer les données ici
  };

  return (
    <button onClick={handleClick} disabled={isClearing}>
      Effacer
    </button>
  );
}