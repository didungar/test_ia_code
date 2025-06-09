import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const TermsAndConditions = () => {
  const [isLoading, setIsLoading] = useState(true);
  const [pdfFile, setPdfFile] = useState(null);

  // Load PDF file on mount
  useEffect(() => {
    fetch('./terms_and_conditions.pdf')
      .then((response) => response.blob())
      .then((blob) => {
        setPdfFile(URL.createObjectURL(blob));
        setIsLoading(false);
      })
      .catch(() => {
        console.error('Error loading PDF file');
      });
  }, []);

  // Render PDF file or loading message
  return (
    <>
      {isLoading && <p>Loading...</p>}
      {!isLoading && pdfFile && (
        <iframe src={pdfFile} title="Terms and Conditions" />
      )}
    </>
  );
};