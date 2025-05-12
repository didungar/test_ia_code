javascript
import React, { useState } from 'react';
import axios from 'axios';

const ResultVerification = () => {
  const [result, setResult] = useState(null);
  const [isLoading, setIsLoading] = useState(false);
  const [error, setError] = useState(null);

  const fetchResult = async (id) => {
    try {
      setIsLoading(true);
      const response = await axios.get(`/api/results/${id}`);
      setResult(response.data);
    } catch (error) {
      setError(error);
    } finally {
      setIsLoading(false);
    }
  };

  return (
    <div>
      <h1>Vérification des résultats</h1>
      <p>{isLoading ? 'Chargement...' : ''}</p>
      {error && <p>{error.message}</p>}
      {result && (
        <>
          <ul>
            {result.map((item) => (
              <li key={item.id}>{item.name}</li>
            ))}
          </ul>
        </>
      )}
    </div>
  );
};

export default ResultVerification;