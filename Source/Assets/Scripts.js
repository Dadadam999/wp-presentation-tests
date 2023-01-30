
window.addEventListener("load", function()
{
    const avatarfileMufh = document.getElementById('avatar-upload-file');

    if( avatarfileMufh != null )
    {
        let imageAvatar = document.querySelector('#mufh-author-avatar');

        avatarfileMufh.addEventListener("change", async function()
        {

            let formData = new FormData();
            formData.append( "mufh-avatar_nonce", document.querySelector('#mufh-avatar_nonce').value );
            formData.append( "avatar-upload-file", document.querySelector('#avatar-upload-file').files[0] );
            formData.append( "mufh-user-id", document.querySelector('#mufh-user-id').value );

            let request = await fetch
            (
                 '/wp-json/MultipleUploadsForHeilz/v1/uploadavatar',
                 {
                    method: 'POST',
                    credentials: 'include',
                    body: formData
                 }
            );

            if (request.ok)
            {
                const answer = await request.json();

                if(answer.code == 0)
                {
                   imageAvatar.src = answer.avatar;
                   console.log('upload avatar');
                }
            }
            else
            {
              console.error('error avatar');
            }

        });
    }

    const metapolies = document.getElementsByClassName('mufh-meta-field-poly');

    if( metapolies != null )
    {
        for( let i = 0; i < metapolies.length; i++ )
        {
            let button = metapolies[i].querySelector('.mufh-meta-field-button');

            button.addEventListener("click", async function()
            {
                let metakey = button.getAttribute('metakey');
                let userId = button.getAttribute('user_id');

                let btnDisabled = button.getAttribute('disabled');
                let icon = button.querySelector('i.fas');
                let text = document.querySelector('div.mufh-meta-field-poly input[name='+metakey+']');

                if( text == null )
                   text = document.querySelector('div.mufh-meta-field-poly textarea[name='+metakey+']');

                if( text.disabled === true)
                {
                    text.disabled = false;
                    text.classList.add('mufh-meta-field-edit');
                    icon.classList.remove( 'fa-regular', 'fa-pen');
                    icon.classList.add( 'fa-solid', 'fa-save');
                    text.classList.add('mufh-meta-field-edit');
                }
                else
                {
                    text.disabled = true;
                    icon.classList.remove( 'fa-solid', 'fa-save');
                    icon.classList.add( 'fa-solid', 'fa-spinner', 'fa-spin' );
                    text.classList.remove('mufh-meta-field-edit');

                    let formData = new FormData();
                    formData.append( "mufh-user-id", userId );
                    formData.append( "mufh-meta-key", metakey );
                    formData.append( "mufh-meta-value", text.value );

                    let request = await fetch
                    (
                         '/wp-json/MultipleUploadsForHeilz/v1/savemetapoly',
                         {
                            method: 'POST',
                            credentials: 'include',
                            body: formData
                         }
                    );

                    if (request.ok)
                    {
                        let answer = await request.json();

                        if(answer.code == 0)
                        {
                            text.classList.add( 'mufh-meta-field-accept');

                            setTimeout( function() {
                              text.classList.remove( 'mufh-meta-field-accept' );
                            }, 1000 );
                        }
                    }
                    else
                    {
                        text.classList.add( 'mufh-meta-field-error');

                        setTimeout( function() {
                          text.classList.remove( 'mufh-meta-field-error' );
                        }, 1000 );
                    }
                }

                setTimeout( function() {
                  icon.classList.remove( 'fa-solid', 'fa-spinner', 'fa-spin' );
                  icon.classList.add( 'fa-regular', 'fa-pen');
                }, 100 );
          });
        }
     }

     const saveSettingsProfile = document.getElementById('mufh-save-profile-settings');

     if( saveSettingsProfile != null )
     {
         let fields = document.getElementsByTagName('input'); //getElementsByClassName('mufh-field-form-input'); getElementsByTagName('input')
         let defaultTextBtn = saveSettingsProfile.innerHTML;

         saveSettingsProfile.addEventListener("click", async function()
         {
                 let formData = new FormData();
                 formData.append( "mufh-user-id", saveSettingsProfile.getAttribute( 'user_id' ) );

                 for( let i = 0; i < fields.length; i++ )
                    formData.append( "mufh-" + fields[i].name, fields[i].value );

                 saveSettingsProfile.disabled = false;

                 let request = await fetch
                 (
                      '/wp-json/MultipleUploadsForHeilz/v1/savesettingsprofile',
                      {
                         method: 'POST',
                         credentials: 'include',
                         body: formData
                      }
                 );

                 if (request.ok)
                 {
                     let answer = await request.json();

                     if(answer.code == 0)
                     {
                         saveSettingsProfile.classList.add( 'mufh-meta-field-accept');
                         saveSettingsProfile.innerHTML = 'Данные сохранены';

                         setTimeout( function() {
                           saveSettingsProfile.classList.remove( 'mufh-meta-field-accept' );
                           saveSettingsProfile.innerHTML = defaultTextBtn;
                           saveSettingsProfile.disabled = false;
                         }, 1000 );
                     }
                 }
                 else
                 {
                     saveSettingsProfile.classList.add( 'mufh-meta-field-error');
                     saveSettingsProfile.innerHTML = 'Ошибка отправки';

                     setTimeout( function() {
                       saveSettingsProfile.classList.remove( 'mufh-meta-field-error' );
                       saveSettingsProfile.disabled = false;
                       saveSettingsProfile.innerHTML = defaultTextBtn;
                     }, 1000 );
                 }

          });
      }

      const mufhDeatilProfileSave = document.getElementById('mufh-save-bank-details');

      if( mufhDeatilProfileSave != null )
      {
          mufhDeatilProfileSave.addEventListener("click", async function()
          {
              document.getElementById("detail-bank-form").submit();
          });
      }


      const postsOnDelete = document.getElementsByClassName('mufh-button-delete-post');

      if( postsOnDelete != null )
      {
          for( let i = 0; i < postsOnDelete.length; i++)
          {
              postsOnDelete[i].addEventListener("click", async function()
              {
                  let icon = postsOnDelete[i].getElementsByTagName('li')[0];
                  postsOnDelete[i].disabled = true;
                  icon.classList.remove( 'fa-trash');
                  icon.classList.add( 'fa-spinner', 'fa-spin' );

                  let formData = new FormData();
                  formData.append( "mufh-post-id", postsOnDelete[i].getAttribute('post_id') );

                  let request = await fetch
                  (
                       '/wp-json/MultipleUploadsForHeilz/v1/deletepost',
                       {
                          method: 'POST',
                          credentials: 'include',
                          body: formData
                       }
                  );

                  setTimeout( function() {
                      location="/content-author";
                  }, 200 );
              });
          }
      }
});
