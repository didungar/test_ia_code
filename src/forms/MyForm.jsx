import React, { useState } from 'react';
import TermsAndConditions from './terms-and-conditions.pdf';

const TermsAndConditionsComponent = () => {
  const [isReadable, setIsReadable] = useState(false);

  const handleTermsChange = (event) => {
    setIsReadable(event.target.value > 0);
  };

  return (
    <div>
      <h2>Terms and Conditions</h2>
      <p>Please read the terms and conditions carefully before proceeding.</p>
      <form>
        <textarea onChange={handleTermsChange} />
        {isReadable && (
          <div>
            <p>The terms and conditions are readable and understandable.</p>
          </div>
        )}
        {!isReadable && (
          <div>
            <p>The terms and conditions are not readable or understandable. Please review them carefully before proceeding.</p>
          </div>
        )}
      </form>
    </div>
  );
};