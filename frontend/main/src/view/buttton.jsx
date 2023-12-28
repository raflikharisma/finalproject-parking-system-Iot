// ToggleButton.js

import React, { useState } from 'react';

const ToggleButton = () => {
  const [isToggled, setToggled] = useState(false);

  const handleToggle = async () => {
    const newValue = isToggled ? 0 : 1;

    try {
      // Send a request to your PHP endpoint to update the database
      const response = await fetch('http://localhost/tugas-besar-pirdas/backend/toggle.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ value: newValue }),
      });

      if (response.ok) {
        setToggled(!isToggled);
      } else {
        console.error('Error updating database:', response.statusText);
      }
    } catch (error) {
      console.error('Error updating database:', error.message);
    }
  };

  return (
    <>
    
    <button
      className={`${
        isToggled ? 'bg-black' : 'bg-black'
      } text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-8 ms-8`}
      onClick={handleToggle}
    >
      {isToggled ? 'ON' : 'OFF'}
    </button>
    </>
    
  );
};

export default ToggleButton;
